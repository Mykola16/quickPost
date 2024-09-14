<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'avatar' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['avatar']) && is_object($input['avatar'])) {
            $path = $input['avatar']->store('avatars', 'public');
            $user->forceFill([
                'avatar' => $path,
            ])->save();
        }


        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'avatar' => $input['avatar']->store('avatars', 'public'),
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

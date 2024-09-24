<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $img;

    public $state = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone_number' => '',
    ];

    public function saveData()
    {
        $this->validate([
            'img' => 'nullable|image|max:1024', // Валидация изображения
        ]);

        if ($this->img) {
            // Сохранение изображения
            $path = $this->img->store('avatars', 'public');

            // Обновление пути к изображению в базе данных
            auth()->user()->update([
                'avatar' => $path,
            ]);
        }

        $this->dispatch('panelUpdated');
    }

    public function mount(){
        $fullName = explode(' ', auth()->user()->name);
        if (Auth::user()->utype === 'BSN')
        {

            $this->state['name'] = auth()->user()->name;
            $this->state['email'] = auth()->user()->email;
            $this->state['phone_number'] = auth()->user()->phone_number;
        }
        else
        {
            $this->state['first_name'] = $fullName[0];
            $this->state['last_name'] = isset($fullName[1]) ? $fullName[1] : '';
            $this->state['email'] = auth()->user()->email;
            $this->state['phone_number'] = auth()->user()->phone_number;
        }

    }

    public function updateProfile(UpdatesUserProfileInformation $updater, UpdatesUserPasswords $updater_password){
        $this->validate([
            'state.first_name' => 'required|string|max:255',
            'state.last_name' => 'required|string|max:255',
            'state.email' => 'required|email|max:255',
            'state.phone_number' => 'nullable|string|max:15',
        ]);

        $fullName = trim($this->state['first_name'] . ' ' . $this->state['last_name']);

        $updater->update(auth()->user(),[
            'name' => $fullName,
            'email' => $this->state['email'],
            'phone_number' => $this->state['phone_number'],
        ]);

//        $this->dispatchBrowserEvent('updater', ['message' => 'Update']);




        //updater_password

        $updater_password->update(auth()->user(), [
            'current_password' => $this->state['current_password'] ?? '',
            'password' => $this->state['password'] ?? '',
            'password_confirmation' => $this->state['password_confirmation'] ?? '',
        ]);

            $this->state['current_password'] = '';
            $this->state['password'] = '';
            $this->state['password_confirmation'] = '';
    }

    public function render()
    {
        return view('livewire.settings')->layout("layouts.profile");
    }
}

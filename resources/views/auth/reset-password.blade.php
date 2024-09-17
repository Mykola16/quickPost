<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="forgot_pass_div">
            <div style="display: flex; justify-content: center; margin-bottom: 50px">
                <h1>Введіть новий пароль</h1>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="form-label">Електронна пошта</label>
                    <input id="email" class="form-input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <label for="password" class="form-label">Пароль</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="form-label">Повторіть пароль</label>
                    <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div style="display: flex; justify-content: center; margin-top: 50px">
                    <button type="submit" class="form-button">
                        Відправити
                    </button>
                </div>
            </form>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600" style="margin-top: 15px">
                    {{ __('custom.password_reset_sent') }}
                </div>
            @endif
        </div>
    </x-authentication-card>
</x-guest-layout>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        padding: 100px;
    }

    .forgot_pass_div {
        box-sizing: border-box;
        width: 550px;
        height: auto;
        background: #EFEFEF;
        border: 3px solid #2E2E2E;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        padding: 100px 25px;
    }

    .forgot_pass_div h1 {
        font-family: 'Montserrat', serif;
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 100%;
        text-align: center;
        color: #2E2E2E;
        margin: 0;
    }

    .form-label {
        font-family: 'Montserrat', serif;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 100%;
        color: #2E2E2E;
    }

    .form-input {
        margin: 15px 0;
        box-sizing: border-box;
        width: 100%;
        height: 40px;
        border: 1px solid #2E2E2E;
        border-radius: 15px;
        padding: 15px;
        background: #EFEFEF;
    }

    .form-button {
        width: 182px;
        height: 50px;
        background: #2E2E2E;
        border-radius: 15px;
        font-family: 'Montserrat', serif;
        font-style: normal;
        font-weight: 700;
        font-size: 24px;
        line-height: 100%;
        color: #FFFFFF;
        border: none;
        cursor: pointer;
    }
</style>

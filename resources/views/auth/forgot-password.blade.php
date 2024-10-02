<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        <div class="forgot_pass_div">
            <div style="display: flex; justify-content: center;margin-bottom:50px">
                <h1 style="width: 426px;" >Введіть свою електронну адресу ми надішлемо вам лист</h1>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <label for="email">Електронна пошта</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <a href="{{ route('login') }}">Увійти</a>

                <div style="display: flex; justify-content: center;margin-top:50px">
                    <button type="submit" class="submit-button">
                        Відправити
                    </button>
                </div>
            </form>
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600" style="margin-top: 15px">
                {{ __('custom.password_reset_sent') }}
            </div>
        @endif
    </x-authentication-card>
</x-guest-layout>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
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

    .forgot_pass_div label {
        font-family: 'Montserrat', serif;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 100%;
        color: #2E2E2E;
    }

    .forgot_pass_div input {
        margin: 15px 0;
        box-sizing: border-box;
        width: 100%;
        height: 40px;
        border: 1px solid #2E2E2E;
        border-radius: 15px;
        padding: 15px;
        background: #EFEFEF;
    }

    .forgot_pass_div a {
        font-family: 'Montserrat', serif;
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 100%;
        text-decoration-line: underline;
        color: #2E2E2E;
    }

    .forgot_pass_div .submit-button {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>

    <link rel="stylesheet" href="{{ asset('assets/styles/day.css')}}" id="theme">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/register.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <script>

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            const themeLink = document.getElementById('theme');
            if (savedTheme === '1') {
                themeLink.href = "/assets/styles/night.css";
            } else {
                themeLink.href = "/assets/styles/day.css";
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const themeSwitch = document.getElementById('switchMode').querySelector('input');
            const themeLink = document.getElementById('theme');

            // Проверяем сохраненную тему в localStorage
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                if (savedTheme === '1') {
                    themeLink.href = "/assets/styles/night.css";
                    themeSwitch.checked = true;
                } else {
                    themeLink.href = "/assets/styles/day.css";
                    themeSwitch.checked = false;
                }
            }

            themeSwitch.onclick = function () {
                if (themeSwitch.checked) {
                    themeLink.href = "/assets/styles/night.css";
                    localStorage.setItem('theme', '1');
                } else {
                    themeLink.href = "/assets/styles/day.css";
                    localStorage.setItem('theme', '0');
                }
            };
        });
    </script>
</head>
<body>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="login-container">

                <h2>Увійдіть за допомогою</h2>

                <div class="social-login">
                    <a href="{{ route('Googlepage') }}">
                        <img src="{{ asset('assets/images/Google.png')}}" alt="Google">
                    </a>
                    <a href="{{ route('Facebookpage') }}">
                        <img src="{{ asset('assets/images/Facebook.png')}}" alt="Facebook">
                    </a>
                        {{--<button></button>--}}
                </div>

                <div class="divider">
                    або
                </div>

                <div id="nav">
                    <ul>
                        <div><li class="login2"><a href="{{ route('login') }}">Увійти</a></li></div>
                        <div><li class="registr2"><a href="{{ route('register') }}">Зареєструватись</a></li></div>
                    </ul>
                </div>

                <div class="login-form">

                    <label for="registration-type" class="dropdown-label">Реєстрація як</label>
                    <div style="margin-top: 15px" class="dropdown-container">
                        <select id="registration-type" name="utype" class="dropdown-select" onchange="changeLabels()">
                            <option value="PRV">Приватна особа</option>
                            <option value="BSN">Бізнес</option>
                        </select>
                    </div>

                    <label for="name" id="nameLabel">Iм'я призвіще</label>
                    <input  type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="off">

                    <label for="email">Електронна пошта</label>
                    <input  type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="off">

                    <div id="socialNetworkGroup" style="display: none;">
                        <label for="social_network">Соц мережі (якщо є)</label>
                        <input  type="text" id="social_network" name="social_network" value="{{ old('social_network') }}" autocomplete="off">
                    </div>

                    <label for="password">Пароль</label>
                    <input  type="password" id="password" name="password" required>

                    <label for="password_confirmation">Повторіть Пароль</label>
                    <input  type="password" id="password_confirmation" name="password_confirmation" required autocomplete="off">

                    <div style="text-align: center;">
                        <button type="submit">Зареєструватись</button>
                    </div>
                </div>

                <div class="terms">
                    Під час входу ви погоджуєтесь з нашими
                </div>

                <div class="private">
                    <a href="{{ route('quick-post-terms-of-service') }}">Умовами користування</a>
                </div>

            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function changeLabels() {
        var utype = document.getElementById('registration-type').value;
        var nameLabel = document.getElementById('nameLabel');
        var socialNetworkGroup = document.getElementById('socialNetworkGroup');

        if (utype === 'PRV') {
            nameLabel.textContent = "Iм'я призвіще";
            socialNetworkGroup.style.display = 'none';
        } else if (utype === 'BSN') {
            nameLabel.textContent = 'Назва компанії';
            socialNetworkGroup.style.display = 'block';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        changeLabels();
    });
</script>

</body>
</html>









{{--<div>--}}
{{--    <x-label for="name" value="{{ __('Name') }}" />--}}
{{--    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--</div>--}}

{{--<div class="mt-4">--}}
{{--    <x-label for="email" value="{{ __('Email') }}" />--}}
{{--    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--</div>--}}

{{--<div class="mt-4">--}}
{{--    <x-label for="password" value="{{ __('Password') }}" />--}}
{{--    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--</div>--}}

{{--<div class="mt-4">--}}
{{--    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--</div>--}}

{{--@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--    <div class="mt-4">--}}
{{--        <x-label for="terms">--}}
{{--            <div class="flex items-center">--}}
{{--                <x-checkbox name="terms" id="terms" required />--}}

{{--                <div class="ms-2">--}}
{{--                    {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',--}}
{{--                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',--}}
{{--                    ]) !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </x-label>--}}
{{--    </div>--}}
{{--@endif--}}

{{--<div class="flex items-center justify-end mt-4">--}}
{{--    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--        {{ __('Already registered?') }}--}}
{{--    </a>--}}

{{--    <x-button class="ms-4">--}}
{{--        {{ __('Register') }}--}}
{{--    </x-button>--}}

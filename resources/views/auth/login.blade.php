<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <title>@yield('title')</title>--}}
    <title>Вхід</title>

    <link rel="stylesheet" href="{{ asset('assets/styles/day.css')}}" id="theme">
    <link rel="stylesheet" type="text/css" href="{{ ('assets/styles/login.css') }}">
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



        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
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
                        <div><li class="login"><a href="{{ route('login') }}">Увійти</a></li></div>
                        <div><li class="registr"><a href="{{ route('register') }}">Зареєструватись</a></li></div>
                    </ul>
                </div>

                <div class="login-form">

                    <label for="email">Електронна пошта</label>
                    <input type="email" id="email" name="email" autocomplete="off">
                    <label style="margin-top: 25px" for="password">Пароль</label>
                    <input type="password" id="password" name="password" autocomplete="off">

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Забули пароль?
                    </a>
                    @endif

                    <div style="text-align: center;">
                        <button type="submit">Увійти</button>
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

</body>
</html>

{{--                <div>--}}
{{--                <x-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ms-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/home.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/styles/day.css')}}" id="theme">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Tsukimi+Rounded&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body>
<div class="wrapper">
    <!--header-->
    <header>
        <div class="header">

            <div class="logo">
                <a href="{{ route('Home') }}" class="link-to-home"><img src="{{ asset('assets/images/logo.png')}}" alt="logo"></a>
            </div>

            <div class="switch_div">
                <img class="day" src="{{ asset('assets/images/day.png')}}">
                <label id="switchMode" class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
                <img class="night" src="{{ asset('assets/images/night.png')}}">
            </div>
{{--profile.show--}}
            <ul class="page-menu">
{{--                @if(Route::has('login'))--}}
{{--                    @auth()--}}
{{--                        @if(Auth::user()->utype === 'ADM')--}}
{{--                            <li class="profile"><a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>--}}
{{--                        @else--}}
{{--                            <li class="profile"><a href="{{ route('user.dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>--}}
{{--                        @endif--}}
{{--                    @endif--}}

{{--                @endif--}}
                <li class="profile"><a href="{{ route('profile.show') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                <li class="selected"><a href="{{ route('Selected') }}"><img src="{{ asset('assets/images/selected.png')}}" alt="selected"></a></li>
                <li class="cart"><a href="{{ route('Cart') }}"><img src="{{ asset('assets/images/cart.png')}}" alt="cart"></a></li>
            </ul>

        </div>
    </header>




    {{ $slot }}






</div>

<footer>
    <hr>

    <div class="wrapper">
        <div class="footer-first-line">

            <div class="logo-footer">
                <a href="{{ route('Home') }}" class="link-to-home"><img src="{{ asset('assets/images/logo.png')}}" alt="logo"></a>
            </div>

            <div class="footer-list">
                <ul class="first">
                    <li class="title"><a href="#">Про нас</a></li>
                    <li><a href="#">Про QuickPost</a></li>
                    <li><a href="#">Контактна інформація</a></li>
                    <li><a href="#">Захист  легальності контенту</a></li>
                </ul>

                <ul class="second">
                    <li class="title"><a href="#">Покупцям</a></li>
                    <li><a href="#">Довідка для покупців</a></li>
                </ul>

                <ul class="third">
                    <li class="title"><a href="#">Продавцям</a></li>
                    <li><a href="#">Посібник для продавців</a></li>
                    <li><a href="#">Угода користувача</a></li>
                    <li><a href="#">Політика конфіденційності</a></li>
                    <li><a href="#">Правила роботи</a></li>
                </ul>
            </div>



        </div>

        <div class="images">
            <a href="#"><img src="{{ asset('assets/images/icon_instagram.png')}}" alt="icon_instagram"></a>
            <a href="#"><img src="{{ asset('assets/images/icon_facebook.png')}}" alt="icon_facebook"></a>
            <a href="#"><img class="'icon_youtube" src="{{ asset('assets/images/icon_youtube.png')}}" alt="icon_youtube"></a>
            <a href="#"><img src="{{ asset('assets/images/icon_twitter.png')}}" alt="icon_twitter"></a>
        </div>

    </div>

</footer>



<script src="{{ asset('assets/script.js')}}"></script>
@livewireScripts
</body>
</html>


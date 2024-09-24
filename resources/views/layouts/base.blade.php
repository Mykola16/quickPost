<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="QuickPost" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/home.css')}}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/styles/user_profile.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/styles/media.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/styles/day.css')}}" id="theme">
    <link rel="stylesheet" href="{{ asset('assets/styles/footer_pages.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Tsukimi+Rounded&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>


    @livewireStyles
</head>
<body>

@livewire('cart-component')

<div class="wrapper">
    <!--header-->
    @livewire('header')

    {{ $slot }}








</div>
<div class="box2">

    <div class="icono">
        <a href="https://t.me/Mashavaskul"><img src="{{ asset('favicon.png')}}" alt=""></a>
    </div>

    <p>
        Вітаю! Я ваш дружній помічник. Якщо у вас виникли питання або потрібна допомога, просто натисніть на мене.
        Ми завжди раді допомогти вам і відповісти на всі ваші запитання. Давайте разом зробимо ваш досвід ще приємнішим!
    </p>
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
                    <li style="cursor: default" class="title"><a>Про нас</a></li>
                    <li><a href="{{ route('about-QuickPost') }}">Про QuickPost</a></li>
                    <li><a href="#">Контактна інформація</a></li>
                    <li><a href="{{ route('content-Protection-QuickPost') }}">Захист  легальності контенту</a></li>
                </ul>

                <ul class="second">
                    <li style="cursor: default" class="title"><a>Покупцям</a></li>
                    <li><a href="#">Довідка для покупців</a></li>
                    <li><a href="{{route('quick-post-terms-of-service')}}">Умови користування</a></li>
                </ul>

                <ul class="third">
                    <li style="cursor: default" class="title"><a>Продавцям</a></li>
                    <li><a href="#">Посібник для продавців</a></li>
                    <li><a href="#">Угода користувача</a></li>
                    <li><a href="#">Політика конфіденційності</a></li>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('assets/script.js')}}" defer></script>
<script src="{{ asset('assets/script2.js')}}"></script>
<script src="{{ asset('assets/slider.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>



@stack('scripts')

@livewireScripts




</body>
</html>


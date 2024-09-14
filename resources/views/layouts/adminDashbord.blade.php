<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="QuickPost" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/home.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/styles/admin_profile.css')}}">
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

@livewire('cart-component')

<div class="wrapper" >
    <!--header-->

    @livewire('header')

    @livewire('search')

    <div class="admin_profile_page">
        <div class="admin_profile_menu">

            <div class="info_admin">
                <div class="admin_name">
                    <a>Привіт, admin</a>
                </div>
                <div class="admin_avatar">
                    {{--<img src="{{ asset('assets/images/profile_menu_img/avatar2.png')}}" alt="avatar">--}}
                    @if(Auth::user()->avatar == null)
                        <img style="width: 80px; height: 80px;" src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar">
                    @else
                        <img style="width: 80px; height: 80px;" src="{{Storage::url(Auth::user()->avatar)}}" alt="">
                    @endif

                    {{--<img src="/laravel/storage/app/public/photos/{{$image}}" alt="">--}}
                </div>
            </div>

            <div style="margin-top: 31px">
                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_home.png') }}" alt="">
                    <a href="{{ route('admin.dashboard') }}"><p>Головна</p></a>
                </div>

                <div class="admin_profile_menu_item">
                    <img style="height: 25px" src="{{ asset('assets/images/admin_menu_img/admin_category.png') }}" alt="">
                    <a href="{{ route('admin.category') }}"><p>Категорії</p></a>
                </div>


                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_list_product.png') }}" alt="">
                    <a href="{{ route('admin.advertisement') }}"><p>Оголошення</p></a>
                </div>


                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_users.png') }}" alt="">
                    <a href="{{ route('admin.users') }}"><p>Користувачі</p></a>
                </div>

                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_Reviews.png') }}" alt="">
                    <a href="{{ route('admin.reviews') }}"><p>Відгуки та рейтинги</p></a>
                </div>

                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_zamovlennya.png') }}" alt="">
                    <a href="{{ route('admin.zamovlennya') }}"><p>Замовлення</p></a>
                </div>

                <div class="admin_profile_menu_item">
                    <img src="{{ asset('assets/images/admin_menu_img/admin_exit.png') }}" alt="">

                    @if (Auth::user())

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <p style="margin-bottom: 18px; margin-left: 10px">Вийти</p>
                            </a>
                        </form>
                    @endif

                    {{--                    <a href="{{ route('logout') }}" ><p>Вийти</p></a>--}}
                </div>

            </div>

        </div>

        <div class="admin_profile_content">
            {{ $slot }}
        </div>


    </div>










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
                    <li><a href="#">Захист легальності контенту</a></li>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{--<script src="{{ asset('assets/script.js')}}"></script>--}}
<script src="{{ asset('assets/admin.js')}}"></script>

@livewireScripts
</body>
</html>

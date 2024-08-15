<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="QuickPost" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/home.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/styles/user_profile.css')}}">
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

<div id="myModal2" class="modal-cont">

    <!-- Modal content -->
    <div class="modal-context">
        <div class="df">
            <img class="cart_img" src="{{asset('assets/images/кошик.png')}}" alt="">
            <div><a>Кошик</a></div>
            <div class="close_div"><img class="close" src="{{asset('assets/images/close.png')}}" alt=""></div>
        </div>

        <div class="cart_product_list">
            <div class="cart_product_item">

            </div>
        </div>

        <div class="cart_btn">
            <div class="razom">
                <a>Разом: 120000 грн</a>
            </div>

            <button onclick="location.href='{{route('Oformlennya')}}';" class="button_submit">
                <a>Оформити замовлення</a>
            </button>
        </div>
    </div>

</div>

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


                @if(Route::has('login'))

                    @auth()
                        @if(Auth::user()->utype === 'ADM')
                            <li class="profile"><a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                        @else
                            <li class="profile"><a href="{{ route('user.dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                        @endif

                    @else()
                        <li class="profile"><a href="{{ route('login') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                    @endauth
                @endif

                <li class="selected"><a href="{{ route('Chosen') }}"><img src="{{ asset('assets/images/selected.png')}}" alt="selected"></a></li>
                <li class="cart" id="myBtn2"><a><img src="{{ asset('assets/images/cart.png')}}" alt="cart"></a></li>
            </ul>

        </div>
    </header>

    <div class="content">
        <div class="search">
            <input type="text" name="text" id="input" placeholder="Що шукаєте?" autocomplete="off" autocorrect="off">
            <label for="input">
                <img class="micIcon" src="{{ asset('assets/images/mic_icon.png')}}" alt="mic_icon">
            </label>
        </div>

        <div class="search_map">
            <input type="text" name="text" class="input" id="input" placeholder="Вся Україна" autocomplete="off" autocorrect="off">
            <label for="input">
                <img src="{{ asset('assets/images/map.png')}}" alt="search__icon">
            </label>
        </div>

        <div class="btn">
            <button class="button_search" type="submit">
                <p>Пошук</p>
                <img src="{{ asset('assets/images/search_icon.png')}}" alt="search_icon">
            </button>
        </div>
    </div>

    <div class="profile_page">
        <div class="profile_menu">

            <div class="info_user">
                <div class="avatar">
                    <img src="{{ asset('assets/images/profile_menu_img/avatar2.png')}}" alt="avatar">
                </div>
                <div class="user_name">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                </div>
            </div>

            <div style="margin-top: 25px">
                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/advertisement.png') }}" alt="">
                    <a href="{{ route('user.dashboard') }}"><p>Ваші оголошення</p></a>
                </div>

                <div class="profile_menu_item">
                    <img style="height: 25px" src="{{ asset('assets/images/profile_menu_img/message.png') }}" alt="">
                    <a href="{{ route('Message') }}"><p>Повідомлення</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/selected.png') }}" alt="">
                    <a href="{{ route('Chosen') }}"><p>Обране</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/history.png') }}" alt="">
                    <a href="{{ route('History') }}"><p>Історія замовлень</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/reviews.png') }}" alt="">
                    <a href="{{ route('Reviews') }}"><p>Мої відгуки</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/star.png') }}" alt="">
                    <a href="{{ route('Subscription') }}"><p>Підписка</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/settings.png') }}" alt="">
                    <a href="{{ route('Settings') }}"><p>Налаштування</p></a>
                </div>

                <div class="profile_menu_item">
                    <img src="{{ asset('assets/images/profile_menu_img/exit.png') }}" alt="">

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

        <div class="profile_content">
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

<script src="{{ asset('assets/script.js')}}"></script>


@livewireScripts
</body>
</html>


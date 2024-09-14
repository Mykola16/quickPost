<div>
    <div class="info_user">
        <div class="avatar">
            {{--<img src="{{ asset('assets/images/profile_menu_img/avatar2.png')}}" alt="avatar">--}}
            @if(Auth::user()->avatar == null)
                <img src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar">
            @else
                <img src="{{Storage::url(Auth::user()->avatar)}}" alt="">
            @endif
            {{--<img src="/laravel/storage/app/public/photos/{{$image}}" alt="">--}}
        </div>
        <div class="user_name">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
        </div>
    </div>

    <div style="margin-top: 25px">
        <div class="profile_menu_item">
            <img src="{{ asset('assets/images/profile_menu_img/advertisement.png') }}" alt="">
            <a href="{{ route('dashboard') }}"><p>Ваші оголошення</p></a>
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

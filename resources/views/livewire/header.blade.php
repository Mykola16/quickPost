<header>

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



    <div class="header">


        <div class="logo">
            <a href="{{ route('Home') }}" class="link-to-home"><img src="{{ asset('assets/images/logo.png')}}" alt="logo"></a>
        </div>


        {{--profile.show--}}
        <div class="header_item">
        <ul class="page-menu">

            <div class="switch_div">
                <img class="day" src="{{ asset('assets/images/day.png')}}">
                <label id="switchMode" class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
                <img class="night" src="{{ asset('assets/images/night.png')}}">
            </div>

            @if(Route::has('login'))

                @auth()
                    @if(Auth::user()->utype === 'ADM')
                        <li class="profile"><a href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                    @else
                        <li class="profile"><a href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                    @endif

                @else()
                    <li class="profile"><a href="{{ route('login') }}"><img src="{{ asset('assets/images/profile.png')}}" alt="profile"></a></li>
                @endauth
            @endif
            @if(Route::has('login'))
                @auth()
                    <li class="selected"><a href="{{ route('Chosen') }}"><img src="{{ asset('assets/images/selected.png')}}" alt="selected"></a></li>
                @else()
                    <li class="selected"><a href="{{ route('login') }}"><img src="{{ asset('assets/images/selected.png')}}" alt="selected"></a></li>
                @endif
            @endif
            <li class="cart" id="myBtn2"><a><img src="{{ asset('assets/images/cart.png')}}" alt="cart"></a>
                @if($cartitems->isNotEmpty())
                    <div class="countCart">
                        {{count($cartitems)}}
                    </div>
                @else

                @endif

            </li>
        </ul>
        </div>
    </div>

</header>

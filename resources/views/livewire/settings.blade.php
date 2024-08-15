@section('title')
    Налаштування
@endsection

<div>
    <h1 class="profile_page_name">Налаштування</h1>

    <div class="all_setting_menu">
        <div class="setting_menu_block">
            <div class="setting_menu" onclick="toggleAccordion(this)">
                <div class="df">
                    <a> Персональні дані</a>
                    <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                </div>
            </div>

            <div class="accordion-content">
                <div class="cont">
                    <div>
                        <label>Ім'я</label><br>
                        <input type="text" name="first_name"><br>
                    </div>
                    <div>
                        <label>Прізвище</label><br>
                        <input type="text" name="last_name"><br>
                    </div>
                    <div>
                        <label>По Батькові</label><br>
                        <input type="text" name="middle_name"><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="setting_menu_block">
            <div class="setting_menu" onclick="toggleAccordion(this)">
                <div class="df">
                    <a> Змінити фото профіля</a>
                    <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                </div>
            </div>

            <div class="accordion-content">
                <div class="cont">

                </div>
            </div>
        </div>

        <div class="setting_menu_block">
            <div class="setting_menu" onclick="toggleAccordion(this)">
                <div class="df">
                    <a>Змінити електрону адресу</a>
                    <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                </div>
            </div>

            <div class="accordion-content">
                <div class="cont">

                </div>
            </div>
        </div>

        <div class="setting_menu_block">
            <div class="setting_menu" onclick="toggleAccordion(this)">
                <div class="df">
                    <a>Змінити телефон</a>
                    <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                </div>
            </div>

            <div class="accordion-content">
                <div class="cont">

                </div>
            </div>
        </div>

        <div class="setting_menu_block">
            <div class="setting_menu" onclick="toggleAccordion(this)">
                <div class="df">
                    <a>Змінити пароль</a>
                    <div><img  src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>

                </div>
            </div>

            <div class="accordion-content">
                <div class="cont">

                </div>
            </div>
        </div>
    </div>
</div>

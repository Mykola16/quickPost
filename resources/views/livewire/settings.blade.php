@section('title')
    Налаштування
@endsection

<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="profile_page_name">Налаштування</h1>
    <form wire:submit.prevent="updateProfile">
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
                        @if(Auth::user()->utype === 'BSN')
                        <div>
                            <label>Ім'я</label><a>*</a><br>
                            <input wire:model.defer="state.name" type="text" name="name"><br>
                            @error('state.name') <span class="error">Помилка</span> @enderror
                        </div>
                        @else
                            <div>
                                <label>Ім'я</label><a>*</a><br>
                                <input wire:model.defer="state.first_name" type="text" name="first_name"><br>
                                @error('state.first_name') <span class="error">Помилка</span> @enderror
                            </div>
                            <div>
                                <label>Прізвище</label><a>*</a><br>
                                <input wire:model.defer="state.last_name" type="text" name="last_name"><br>
                                @error('state.last_name') <span class="error">Помилка</span> @enderror
                            </div>
{{--                            <div>--}}
{{--                                <label>По Батькові</label><br>--}}
{{--                                <input type="text" name="middle_name"><br>--}}
{{--                            </div>--}}
                        @endif
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

                <div class="accordion-content" style="height: 180px">
                    <div class="cont df">
                        <div class="img_box">
                            <input type="file" id="fileInput" wire:model="img" style="display: none;">
                            <label for="fileInput" class="file-upload-button">
                                <p style="font-size: 14px;">Редагувати фото</p>
                            </label>
                        </div>

                        <div class="img_box" style="margin-left: 35px; padding: 10px;">
                            @if ($img)
                                <!-- Если новое изображение загружено, отображаем его -->
                                <img class="file_img" src="{{ $img->temporaryUrl() }}" alt="Фото профиля" style="width: 100%; height: auto;">
                            @else
                                <!-- Если изображение не загружено, показываем текущее фото профиля -->
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Фото профиля" style="width: 100%; height: auto;">
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            {{--                        <div class="cont df">--}}
            {{--                            <div class="img_box" style="background-color: #EFEFEF; padding: 10px;">--}}
            {{--                                <input type="file" id="fileInput" wire:model="img" style="display: none;">--}}
            {{--                                <label for="fileInput" class="file-upload-button" style="cursor: pointer;">--}}
            {{--                                    <p style="font-size: 14px;">Редагувати фото</p>--}}
            {{--                                </label>--}}
            {{--                                @error('img')--}}
            {{--                                <span class="error" style="color: red;">{{ $message }}</span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}

            {{--                            <div class="img_box" style="background-color: #EFEFEF; margin-left: 35px; padding: 10px;">--}}
            {{--                                @if ($img)--}}
            {{--                                    <!-- Если новое изображение загружено, отображаем его -->--}}
            {{--                                    <img class="file_img" src="{{ $img->temporaryUrl() }}" alt="Фото профиля" style="width: 100%; height: auto;">--}}
            {{--                                @else--}}
            {{--                                    <!-- Если изображение не загружено, показываем текущее фото профиля -->--}}
            {{--                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Фото профиля" style="width: 100%; height: auto;">--}}
            {{--                                @endif--}}
            {{--                            </div>--}}

            {{--                        </div>--}}

{{--            /* Редагувати фото */--}}

{{--            position: absolute;--}}
{{--            width: 124px;--}}
{{--            height: 14px;--}}
{{--            left: 515px;--}}
{{--            top: 593px;--}}

{{--            font-family: 'Montserrat';--}}
{{--            font-style: normal;--}}
{{--            font-weight: 500;--}}
{{--            font-size: 14px;--}}
{{--            line-height: 100%;--}}
{{--            /* identical to box height, or 14px */--}}
{{--            text-decoration-line: underline;--}}

{{--            color: #2E2E2E;--}}



            <div class="setting_menu_block">
                <div class="setting_menu" onclick="toggleAccordion(this)">
                    <div class="df">
                        <a>Змінити електрону адресу</a>
                        <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                    </div>
                </div>

                <div class="accordion-content">
                    <div class="cont">
                        <div>
                            <label>Email</label><br>
                            <input wire:model.defer="state.email" type="text" name="email" style="width:250px"><br>
                            @error('state.email') <span class="error">Помилка</span> @enderror
                        </div>
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
                        <div>
                            <label>Телефон</label><br>
                            <input wire:model.defer="state.phone_number" type="text" name="phone_number" style="width:300px"><br>
                            @error('state.phone_number') <span class="error">Помилка</span> @enderror
                        </div>
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
                    <div class="cont df">
                        <div>
                            <label>Поточний пароль</label><br>
                            <input wire:model.defer="state.current_password" type="password" name="password" style="width:250px;margin-right:35px"><br>
                            @error('state.current_password') <span class="error">Помилка</span> @enderror
                        </div>
                        <div>
                            <label>Новий пароль</label><br>
                            <input wire:model.defer="state.password" type="password" name="password" style="width:250px;margin-right:35px"><br>
                            @error('state.password') <span class="error">Помилка</span> @enderror
                        </div>
                        <div>
                            <label>Підтвердіть пароль</label><br>
                            <input wire:model.defer="state.password_confirmation" type="password" name="password" style="width:250px;margin-right:35px"><br>
                            @error('state.password_confirmation') <span class="error">Помилка</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn_setting">
                <button wire:click="saveData" id="btn_form" type="submit">Зберегти</button>
            </div>

        </div>
    </form>
</div>

@section('title')
    Користувачі
@endsection

<div>
    <div class="users_admin_page">
    <h1>Користувачі</h1>



    <div class="search_user_icon">
        <input type="search" placeholder="Знайти користувача" wire:model.debounce.300ms="searchTerm">
        <button wire:click="$refresh">Пошук</button>
        <img src="{{ asset('assets/images/search_black.png')}}" alt="search_icon">
    </div>

        <div>
            <!-- Modal for delete confirmation -->
            @if($showModal)
                <div class="modal5" style="display: flex;">
                    <div class="modal-content5">
                        <span class="close-button5" wire:click="$set('showModal', false)">&times;</span>
                        <h2>Підтвердження видалення</h2>
                        <p>Ви дійсно хочете видалити користувача?</p>
                        <button wire:click="deleteUser">Так, видалити</button>
                        <button wire:click="$set('showModal', false)">Скасувати</button>
                    </div>
                </div>
            @endif
        </div>


    <table class="name_table">
        <tr>
            <th style="padding-right: 178px;">
                Ім’я та прізвище
            </th>
            <th style="padding-right: 261px;">
                Email
            </th>
            <th>
                Роль
            </th>
        </tr>
    </table>





        <div class="users_div">
            @if($users->isEmpty())
                <p>Результатів не знайдено</p>
            @else
                <table class="cont_table">
                    @php
                        // Визначаємо список користувачів, залежно від наявності пошукового терміну
                        $displayedUsers = $searchTerm ? $this->getFilteredCategories() : $users;
                    @endphp

                    @foreach ($displayedUsers as $user)
                        <tr>
                            <th><input type="checkbox"></th>
                            <td>
                                <p style="width: 319px">
                                    {{ $user->name }}
                                </p>
                            </td>

                            <td>
                                <p style="width: 308px">
                                    {{ $user->email }}
                                </p>
                            </td>

                            <td>
                                <p style="width: 190px">
                                    @switch($user->utype)
                                        @case('ADM')
                                            Адміністратор
                                            @break
                                        @case('PRV')
                                            Приватна особа
                                            @break
                                        @case('BSN')
                                            Бізнес
                                            @break
                                    @endswitch
                                </p>
                            </td>

                            <td class="points">
                                <div class="df" style="position: relative;">
                                    <div class="point_btn" wire:click="selectUser({{ $user->id }})">
                                        @for($i = 1; $i <= 3; $i++)
                                            <div class="point"></div>
                                        @endfor
                                    </div>

                                    @if($selectedUserId == $user->id)
                                        <div class="menu22">
                                            <ul>
                                                <li style="padding-top: 20px; padding-bottom: 17px;" >Редагувати</li> {{--wire:click="editUser({{ $user->id }})"--}}
                                                <li style="padding: 17px 0;">Заблокувати</li>
                                                <li style="padding: 17px 0;" wire:click="sms({{ $user->id }})">Надіслати сповіщення</li>
                                                <li style="padding-top: 17px; padding-bottom: 20px;" wire:click="openDeleteConfirmation({{ $user->id }})">Видалити</li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>

</div>

    <div class="df" style="position: relative; margin-bottom: 35px">
{{--        <button class="all_select">--}}
{{--            <p>Обрати все</p>--}}
{{--        </button>--}}
{{--        <button class="del_user">--}}
{{--            <p>Видалити</p>--}}
{{--        </button>--}}
        <button class="add_user" wire:click="add_user">
            <p>Додати</p>
        </button>
    </div>

    <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror<br>
        @error('email') <span class="error">{{ $message }}</span> @enderror<br>
        @error('password') <span class="error">{{ $message }}</span> @enderror<br>
        @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror<br>
        @error('selectedRole') <span class="error">{{ $message }}</span> @enderror<br>
    </div>

    @if($isEditModalOpen)
    <div class="add_modal" > {{--wire:ignore--}}
        <div class="add_cont">
            <form wire:submit.prevent="{{ $selectedUserId ? 'updateUser' : 'saveUser' }}">
                <a class="x" style="position: absolute; top: 10px; right: 10px;cursor: pointer;font-size: 25px;font-weight: 500"
                   wire:click="closeModal">x
                </a>
                <label>Ім’я користувача</label><br>
                <input type="text" wire:model="name">

                <label>Електронна адреса</label><br>
                <input type="email" wire:model="email">

                <label>Пароль</label><br>
                <input type="password" wire:model="password">

                <label>Підтвердити пароль</label><br>
                <input type="password" wire:model="password_confirmation">

                <div style="display: flex;justify-content: center;">
                    <div>
                        <div class="rol_user df" onclick="selectedRole(this)">
                            <a>
                                {{ $selectedRole ?? 'Роль' }}
                            </a>
                            <img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="">
                        </div>

                        <div class="cont_role" id="cont_role">
                            @foreach ($roles as $role)
                                <div wire:click="selectRole('{{ $role }}')">
                                    <p>{{ $role }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div style="display: flex;justify-content: center;">
                    <button type="submit">{{ $selectedUserId ? 'Оновити' : 'Зберегти' }}</button>
                </div>

            </form>
        </div>
    </div>
    @endif

    <style>
        .modal-content5 button{
            width: 180px;
            height: 40px;

            border-radius: 15px;

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 100%;
        }
    </style>

    <script>
        document.addEventListener('click', function(event) {
            let menu = document.querySelector('.menu');
            if (menu && !menu.contains(event.target)) {
                @this.call('deselectUser');
            }
        });

        function selectedRole(element) {
            const content = element.nextElementSibling;

            const icon = element.querySelector('img');

            if (content.style.display === "block") {
                content.style.display = "none";
                element.style.borderWidth = "3px 3px  3px 3px"
                element.style.borderRadius = "15px 15px 15px 15px";


                if (icon) {
                    icon.src = "/assets/images/seting_menu_btn.png";
                }

            } else {
                content.style.display = "block";
                element.style.borderRadius = "15px 15px 0 0";
                element.style.borderWidth = "3px 3px  0 3px"
                // content.style.borderRadius = "0 0 5px 5px";


                if (icon) {
                    icon.src = "/assets/images/btn_v_setting.png";
                }
            }
        }

        // function selectedRol(role) {
        //     // Зміна тексту вибраної області
        //     document.getElementById('selected-role-text').textContent = role;
        // }
    </script>
</div>

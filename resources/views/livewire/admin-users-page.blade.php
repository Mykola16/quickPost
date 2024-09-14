@section('title')
    Користувачі
@endsection

<div>
    <div class="users_admin_page">
    <h1>Користувачі</h1>

    <div class="search_user_icon">
        <input type="search" placeholder="Знайти користувача">
        <button>Пошук</button>
        <img src="{{ asset('assets/images/search_black.png')}}" alt="search_icon">
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
        <table class="cont_table">
            @foreach($users as $user)
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

                    @if($user->utype === 'ADM')
                        <td>
                            <p style="width: 190px">
                                Адміністратор
                            </p>
                        </td>
                    @elseif($user->utype === 'PRV')
                        <td>
                            <p style="width: 190px">
                                Приватна особа
                            </p>
                        </td>
                    @elseif($user->utype === 'BSN')
                        <td>
                            <p style="width: 190px">
                                Бізнес
                            </p>
                        </td>
                    @endif


                    <td class="points">
                        <div class="df" style="position: relative;">
                            <div class="point_btn" wire:click="selectUser({{ $user->id }})" >
                                @for($i = 1; $i <= 3; $i++)
                                    <div class="point"></div>
                                @endfor
                            </div>

                            @if($selectedUserId == $user->id)
                                <div class="menu">
                                    <ul>
                                        <li style="padding-top: 20px; padding-bottom: 17px;">Редагувати</li>
                                        <li style="padding: 17px 0;">Заблокувати</li>
                                        <li style="padding: 17px 0;">Надіслати сповіщення</li>
                                        <li style="padding-top: 17px; padding-bottom: 20px;">Видалити</li>
                                    </ul>
                                </div>
                            @endif
                        </div>


                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>

    <div class="df" style="position: relative">
        <button class="all_select">
            <p>Обрати все</p>
        </button>
        <button class="del_user">
            <p>Видалити</p>
        </button>
        <button class="add_user" id="add_btn" >
            <p>Додати</p>
        </button>
    </div>

    <div class="add_modal" id="add_modal" wire:ignore>
        <div class="add_cont">
            <form wire:submit.prevent="saveUser">
                <label>Ім’я користувача</label><br>
                <input type="text" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror

                <label>Електронна адреса</label><br>
                <input type="email" wire:model="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror

                <label>Пароль</label><br>
                <input type="password" wire:model="password">
                @error('password') <span class="error">{{ $message }}</span> @enderror

                <label>Підтвердити пароль</label><br>
                <input type="password" wire:model="password_confirmation">
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror

                <div style="display: flex;justify-content: center;">
                    <div style="margin-top: 19px" class="drop_container">
                        <select wire:model="utype" class="drop_select">
                            <option>Роль</option>
                            <option value="PRV">Приватна особа</option>
                            <option value="BSN">Бізнес</option>
                            <option value="ADM">Адміністратор</option>
                        </select>
                    </div>
                </div>
                @error('utype') <span class="error">{{ $message }}</span> @enderror

                <div style="display: flex;justify-content: center;">
                    <button type="submit">Зберегти</button>
                </div>
            </form>
        </div>


    <script>
        document.addEventListener('click', function(event) {
            let menu = document.querySelector('.menu');
            if (menu && !menu.contains(event.target)) {
                @this.call('deselectUser');
            }
        });
    </script>
</div>
</div>

@section('title')
    Категорії
@endsection

<div>
    <h1>Категорії</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="category_admin_div">
        <div class="search_user_icon2">
            <input type="search" placeholder="Знайти категорію" wire:model.debounce.300ms="searchTerm">
            <button style="height: 50px" wire:click="$refresh">Пошук</button>
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
                        <button wire:click="deleteCategory">Так, видалити</button>
                        <button wire:click="$set('showModal', false)">Скасувати</button>
                    </div>
                </div>
            @endif
        </div>


        <!-- Відображення відфільтрованих категорій -->
        @if ($searchTerm)
                @foreach ($this->getFilteredCategories() as $category)
                    <div style="margin-bottom: 15px; position: relative">
                        <div class="cat_admin df" >
                            <div>
                                <input type="checkbox">
                            </div>

                            <div class="cat_name_admin">
                                <p>{{ $category->name }}</p>
                            </div>

                            <div class="edit_cat">
                                <p wire:click="editCategory({{ $category->id }})">Редагувати</p>
                            </div>

                            <div class="delete_cat">
                                <p wire:click="openDeleteConfirmation({{ $category->id }})" >Видалити</p>
                            </div>
                        </div>
                        <div class="menu_cat_adm" onclick="toggleAccordion(this)" wire:click="subCat({{ $category->id }})">

                        </div>

                        @if($openCategoryId === $category->id)
                            <div style="display: block; width: 380px; margin-left: 44px">
                                @if($subCategories)
                                    <div class="subcategoriesAdm">
                                        @foreach($subCategories as $subCategory)
                                            <p>{{ $subCategory->name }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <div style="display: none;"></div>
                        @endif

                    </div>
                @endforeach
        @else



        <div>
            @foreach ($categories as $category)
                <div style="margin-bottom: 15px; position: relative">
                    <div class="cat_admin df" >
                        <div>
                            <input type="checkbox">
                        </div>

                        <div class="cat_name_admin">
                            <p>{{ $category->name }}</p>
                        </div>

                        <div class="edit_cat">
                            <p wire:click="editCategory({{ $category->id }})">Редагувати</p>
                        </div>

                        <div class="delete_cat">
                            <p wire:click="openDeleteConfirmation({{ $category->id }})" >Видалити</p>
                        </div>
                    </div>
                    <div class="menu_cat_adm" onclick="toggleAccordion(this)" wire:click="subCat({{ $category->id }})">

                    </div>

                    @if($openCategoryId === $category->id)
                        <div style="display: block; width: 380px; margin-left: 44px">
                            @if($subCategories)
                                <div class="subcategoriesAdm">
                                    @foreach($subCategories as $subCategory)
                                        <p>{{ $subCategory->name }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <div style="display: none;"></div>
                    @endif

                </div>
            @endforeach
        </div>

        @endif

        <button wire:click="openCreateModal">Додати</button>


{{--            <div style="display: none;" id="add_modal" class="add_modal" wire:ignore>--}}
{{--                <div class="add_cont_cat">--}}
{{--                    <span class="close-button5"  id="add_close">&times;</span>--}}
{{--                    <form wire:submit.prevent="saveCategory">--}}
{{--                        <label>Вкажіть назву</label><br>--}}
{{--                        <input type="text" wire:model="name">--}}

{{--                        <button type="submit">Зберегти</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

        @if($showModal2)
            <div id="add_modal" class="add_modal" >
                <div class="add_cont_cat">
                    <span class="close-button5" wire:click="$set('showModal2', false)">&times;</span>
                    <form wire:submit.prevent="{{ $selectedCategoryId ? 'updateCategory' : 'saveCategory' }}">
                        <label>Вкажіть назву</label><br>
                        <input style="color: #2A2A2A"  type="text" wire:model="name">

                        @if($subCategories)
                            <div class="subcategoriesAdm">
                                @foreach($subCategories as $subCategory)
                                    <p>{{ $subCategory->name }}</p>
                                @endforeach

                            </div>
                        @endif


                            @if($selectedCategoryId)
                            <div style="position: absolute; bottom: 80px">
                                <label>Додати підкатегорію</label><br>
                                <input type="text" style="color: #2A2A2A" wire:model="subCategoryName" placeholder="Назва підкатегорії">
                            </div>
                                <button type="button" style="right: 201px; width: 198px;height: 40px;font-family: 'Montserrat',serif; font-style: normal; font-weight: 500; font-size: 16px; line-height: 120%;" wire:click.prevent="addSubCategory">
                                    Додати підкатегорію
                                </button>
                            @endif

                        <button style="width: 160px;height: 40px;font-family: 'Montserrat',serif; font-style: normal; font-weight: 700; font-size: 16px; line-height: 120%;" type="submit">
                            {{ $selectedCategoryId ? 'Зберегти зміни' : 'Зберегти' }}
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
    <style>
        /*.add_modal{*/
        /*    display: none;*/
        /*}*/

        .modal5 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;

            z-index: 9999;
        }
        .modal-content5 {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 500px;
            position: relative;
        }
        .close-button5 {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .modal-content5 button{
            width: 180px;
            height: 40px;

            border-radius: 15px;

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 100%;

            color: #FFFFFF;
        }

        .modal-content5 h2{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 100%;

            color: #000000;
        }

        .modal-content5 p{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;

            color: #000000;
        }

        .subcategoriesAdm{
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: flex-start; /* Align items to the start */
            gap: 10px; /* Optional: Add some space between items */
            max-width: 100%; /* Ensure container doesn't overflow */
            margin-top: 10px;
        }

        .subcategoriesAdm p{
            /* Косметика до догляду */
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 100%;

            color: #2E2E2E;

            flex: 1 1 180px;

            margin: 0;
        }

        .menu_cat_adm{
            position: absolute;
            top: 0;
            left: 44px;
            width: 360px;
            height: 35px;
        }
    </style>

{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', () => {--}}
{{--            const navItems = document.querySelectorAll('.menu_cat_adm');--}}
{{--            const currentLocation = window.location.href;--}}

{{--            navItems.forEach(item => {--}}
{{--                if (item.href === currentLocation) {--}}
{{--                    item.parentElement.classList.add('active1');--}}
{{--                } else {--}}
{{--                    item.parentElement.classList.remove('active1');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</div>

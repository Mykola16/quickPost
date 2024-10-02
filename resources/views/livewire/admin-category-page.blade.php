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
            <button style="height: 40px" wire:click="$refresh">Пошук</button>
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
                        <input style=""  type="text" wire:model="name">

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
                                <input type="text" style="" wire:model="subCategoryName" placeholder="Назва підкатегорії">
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

@section('title')
    Категорії
@endsection

<div>
    <h1>Категорії</h1>

    <div class="category_admin_div">
        <div class="search_user_icon2">
            <input type="search" placeholder="Знайти категорію">
            <button>Пошук</button>
            <img src="{{ asset('assets/images/search_black.png')}}" alt="search_icon">
        </div>


        <div>
            @foreach ($categories as $category)
                <div style="margin-bottom: 15px">
                    <div class="cat_admin df">
                        <div>
                            <input type="checkbox">
                        </div>

                        <div class="cat_name_admin">
                            <p>{{ $category->name }}</p>
                        </div>

                        <div class="edit_cat">
                            <p>Редагувати</p>
                        </div>

                        <div class="delete_cat">
                            <p>Видалити</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button id="add_btn">Додати</button>

        <div id="add_modal" class="add_modal" wire:ignore>
            <div class="add_cont_cat">
                <form wire:submit.prevent="saveCategory">
                    <label>Вкажіть назву</label><br>
                    <input type="text" wire:model="name">

                    <button type="submit">Зберегти</button>
                </form>
            </div>
        </div>
    </div>
</div>

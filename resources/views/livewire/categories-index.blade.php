@section('title')
    Категорії
@endsection

<div>

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
<div class="Categories">
    <h1>Усі категорії</h1>
    <ul>
        @foreach ($categories as $category)
            <li class="cat-text">
                <a class="cat_a"  href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
</div>

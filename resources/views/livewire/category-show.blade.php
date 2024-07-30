@section('title')
    {{ $category->name }}
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
    <h1>{{ $category->name }}</h1>


        @if ($subCategories->isNotEmpty())
            <ul>
                @foreach ($subCategories as $subCategory)
                    <li class="cat-text">
                        <a class="cat_a"  href="{{ route('categories.show', $subCategory) }}">{{ $subCategory->name }}</a>
                    </li>
                @endforeach
            </ul>


        @endif

        <div class="cat_esc">
            <a class="cat_a" href="{{ route('categories.index') }}">Назад до категорій</a>
        </div>
    </div>

        @if ($products->isNotEmpty())
            <h2>Товари</h2>
            <ul>
                @foreach ($products as $product)
                    <li style="list-style: none">

                        <img style="width: 310px" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">
                        <h3><a style="text-decoration: none; color: #2E2E2E;" href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>
                        <p>{{ $product->short_description }}</p>
                        <p>Ціна: {{ $product->regular_price }} грн</p>
                        <p>--------------------------------------------------------------------</p>
                    </li>
                @endforeach
            </ul>
        @endif


</div>

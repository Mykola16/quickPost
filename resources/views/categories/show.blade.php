
{{--    <h1>{{ $category->name }}</h1>--}}

{{--    @if ($subCategories->isEmpty() && $products->isEmpty())--}}
{{--        <p>Нет подкатегорий или товаров</p>--}}
{{--    @else--}}
{{--        @if ($subCategories->isNotEmpty())--}}
{{--            <h2>Подкатегории</h2>--}}
{{--            <ul>--}}
{{--                @foreach ($subCategories as $subCategory)--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('categories.show', $subCategory) }}">{{ $subCategory->name }}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}

{{--        @if ($products->isNotEmpty())--}}
{{--            <h2>Товары</h2>--}}
{{--            <ul>--}}
{{--                @foreach ($products as $product)--}}
{{--                    <li style="list-style: none">--}}
{{--                        <p>--------------------------------------------------------------------</p>--}}
{{--                        <img style="width: 310px" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">--}}
{{--                        <h3>{{ $product->name }}</h3>--}}
{{--                        <p>{{ $product->description }}</p>--}}
{{--                        <p>Цена: {{ $product->regular_price }} грн</p>--}}
{{--                        <p>--------------------------------------------------------------------</p>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}
{{--    @endif--}}

{{--    <a href="{{ route('categories.index') }}">Назад к категориям</a>--}}


<div > {{--wire:poll.1000ms--}}
    <div class="now_watch">
        @if($productsBeingViewed->isNotEmpty())
            <h1>Зараз передивляються</h1>
        @else
            <h1>Всі оголошення</h1>
        @endif

        <div class="all-products">
            <div class="product-rec">
                @if($productsBeingViewed->isNotEmpty())
                    @foreach($productsBeingViewed as $item)
                        <div class="product-item">
                            <a href="{{ route('product.show', $item->id) }}">
                                <img  src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                            </a>
                            <div class="product-item-info">
                                <a href="{{ route('product.show', $item->id) }}">
                                    {{ $item->name }}
                                </a>
                                <p>{{ $item->regular_price }} грн</p>
                            </div>
                            <div class="product-item-zat">

                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($allProducts as $item)

                        {{--                        @if($item->type === 'vip')--}}
                        {{--                            <div class="Vip_btn">--}}
                        {{--                                <p>Vip</p>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}


                        <div class="product-item">
                            <a href="{{ route('product.show', $item->id) }}">
                                <img  src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                            </a>
                            <div class="product-item-info">
                                <a href="{{ route('product.show', $item->id) }}">
                                    {{ $item->name }}
                                </a>
                                <p>{{ $item->regular_price }} грн</p>
                            </div>
                            <div class="product-item-zat">

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if($productsVip->isNotEmpty())
        <div class="Vip_product">
            <h1>VIP оголошення</h1>

            <div class="df">
                <div class="Vip_product_items df">
                    @foreach($productsVip as $product)
                        <div class="Vip-product-item" wire:ignore>

                            <div class="Vip_btn">
                                <p>Vip</p>
                            </div>

                            <a  href="{{ route('product.show', $product->id) }}">
                                <img src="{{ Storage::url($product->images->first()->img ?? 'no_image.png') }}" alt="">
                            </a>

                            <div class="Vip-product-item-info">
                                <div class="df">
                                    <div class="vip_wh">
                                        <a class="name" href="{{ route('product.show', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </div>

                                    <div class="like_home">
                                        @livewire('product-like-vip', ['productId' => $product->id])
                                    </div>
                                </div>

                                <div class="df price_home">
                                    <p>{{ $product->regular_price }} грн</p>

                                    <div class="stars" style="margin-left: 15px">
                                        <img  src="{{ asset('assets/images/stars.png')}}" alt="" style="width: 120px; height: 21px; margin-top: 4px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else

    @endif

    @if($productsBisns->isNotEmpty())
        <div class="Bigness_products">
            <h1>Для вас</h1>


            <div class="bigness_product">
                @foreach($productsBisns as $item)
                    <div class="bigness_product_item df">
                        <div class="view_bsn df">
                            <div>
                                <a href="{{ route('product.show', $item->id) }}">
                                    <img src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                                </a>
                            </div>
                            <div class="name_bsn" style="margin-left: 50px; text-align: left;">
                                <a href="{{ route('product.show', $item->id) }}" style="text-decoration: none">
                                    {{ $item->name }}
                                </a>

                                <div class="stars2" style="margin-top: 15px">
                                    <img  src="{{ asset('assets/images/stars.png')}}" alt="" style="width: 120px; height: 21px; margin-top: 4px;">
                                </div>

                                <p>{{ $item->regular_price }} грн</p>

                                <div wire:click="addToCart({{ $item->id }})">
                                    <div class="shop_btn">
                                        <a>Додати в кошик</a>
                                        <img src="{{ asset('assets/images/shop_icon.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bsn_mobile">
                            <a href="{{ route('product.show', $item->id) }}">
                                <img src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                            </a>

                            <a class="nameBSN" href="{{ route('product.show', $item->id) }}" style="text-decoration: none">
                                {{ $item->name }}
                            </a>
                            <p>{{ $item->regular_price }} грн</p>

                            <div wire:click="addToCart({{ $item->id }})">
                                <div class="shop_btn">
                                    <a>Додати в кошик</a>
                                    <img src="{{ asset('assets/images/shop_icon.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach

            </div>
        </div>
    @else

    @endif

    <div class="search_div">
        <h1>Популярні запити</h1>

            <div class="pop_zap">
                @foreach($popularQueries as $query)
                    <div class="search_zapit">
                        <p>{{ $query->query }}</p>
                    </div>
                @endforeach
            </div>
    </div>

    <style>
        .vip_wh{
            width: 240px;
            height: 60px;
        }


    </style>

    <script>
        const scrollContainer = document.querySelector('.bigness_product');
        const scrollContainer2 = document.querySelector('.all-products');

        scrollContainer.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });

        scrollContainer2.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer2.scrollLeft += evt.deltaY;
        });


    </script>
</div>


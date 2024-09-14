@section('title')
    {{ $product->name }}
@endsection

<div>

    @if ($message)
        <div id="cart-message" class="alert alert-success">
            {{ $message }}
        </div>

        <script>
            setTimeout(function () {
                document.getElementById('cart-message').style.display = 'none';
            }, 5000);
        </script>
    @endif


    <div class="Product-cart">
        <div class="product_img">


            @php
                $image = '';
                if(count($product->images) > 0)
                {
                    $image = $product->images[0]['img'];
                }
                else{
                    $image = 'no_image.png';
                }

            @endphp
            <img src="{{Storage::url($image)}}" alt="">

        </div>
        <div class="Product-content">

            <h3>{{ $product->name }}</h3>
            <h4 class="product_price">{{ $product->regular_price }} грн</h4>
            <h2>{{ $product->short_description }}</h2>

            <p>Стан</p>
            <a>{{ $product->state }}</a>

            <p style="margin-bottom:15px">Відео огляд</p>

            @if ($product->video)
                <div class="youtube-video">
                    <iframe width="220" height="120" src="{{ Str::replace('watch?v=', 'embed/', $product->video) }}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif


{{--            <p>Колір</p>--}}
{{--            <div class="div_color_img">--}}
{{--                <img class="color_img" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">--}}
{{--                <img class="color_img" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">--}}
{{--            </div>--}}
{{--            <p>Відео огляд</p>--}}
{{--            <img class="video" src="" alt="">--}}
{{--            {{ asset('/assets/images/Products_img/video.png')}}--}}
        </div>
    </div>

    <div style="display: flex;">
        <div class="img_det" >

            @if($image == 'no_image.png')

            @else
                @foreach($product->images as $img)
                    @if($loop->first)
                        <img class="detail_img active" data-image="{{Storage::url($image)}}" src="{{Storage::url($image)}}" alt="">
                    @else
                        <img class="detail_img" data-image="{{Storage::url($img['img'])}}" src="{{Storage::url($img['img'])}}" alt="">
{{--                        <img class="detail_img " data-image="/assets/images/Products_img/{{$img['img']}}" src="/assets/images/Products_img/{{$img['img']}}" alt="{{ $image }}">--}}
                    @endif
                @endforeach

            @endif
        </div>

        <div style="margin-top: 93px;">
            @if(Route::has('login'))
                @auth
                    <button id="showMessageButton"  class="button_buy" wire:click="addToCart({{ $product->id }})">Додати в кошик</button>
                    <button class="button_chat" wire:click="startConversation({{ $product->user_id }})">Чат з продавцем</button>
                @else
                    <button id="showMessageButton" class="button_buy" onclick="window.location='{{ route('login') }}'">Додати в кошик</button>
                    <button class="button_chat" onclick="window.location='{{ route('login') }}'">Чат з продавцем</button>
                @endauth
            @endif
        </div>

    </div>

    <div class="desc-and-reviews">
        <p class="prod_desc">Опис</p>
        <p class="prod_reviews">Відгуки</p>
    </div>

    <p class="product_description">{{ $product->description }}</p>

    <div class="recommendations">
        <p>Може зацікавити</p>

        <div class="all-products">
            <div class="product-rec">
                @foreach($allProducts as $item)

                    <div class="product-item">
                        <a href="{{ route('product.show', $item->id) }}">
                            <img  src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                        </a>
                        <div class="product-item-info">
                            <a href="{{ route('product.show', $item->id) }}">
                                {{ $item->name }}
                            </a>
                            <p style="font-size: 14px;">{{ $item->regular_price }} грн</p>
                        </div>
                        <div class="product-item-zat">

                        </div>
                    </div>
                @endforeach

                    @livewire('product-view-counter', ['product' => $product])



                    <script>
                        window.addEventListener('unload', function () {
                            // Отправка запроса на уменьшение просмотров
                            navigator.sendBeacon("{{ route('decrement.views', $product->id) }}");
                        });
                    </script>


            </div>
        </div>
    </div>



    <script>
        const scrollContainer2 = document.querySelector('.all-products');
        const scrollContainer3 = document.querySelector('.img_det');

        scrollContainer2.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer2.scrollLeft += evt.deltaY;
        });

        scrollContainer3.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer3.scrollLeft += evt.deltaY;
        });


    </script>


</div>

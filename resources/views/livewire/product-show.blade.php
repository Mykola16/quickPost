@section('title')
    {{ $product->name }}
@endsection

<div>

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

            <p>Колір</p>
            <div class="div_color_img">
                <img class="color_img" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">
                <img class="color_img" src="/assets/images/Products_img/{{ $product->image }}" alt="{{ $product->image }}">
            </div>
            <p>Відео огляд</p>
            <img class="video" src="{{ asset('/assets/images/Products_img/video.png')}}" alt="video">
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
                        <img class="detail_img active" data-image="{{Storage::url($image)}}" src="{{Storage::url($image)}}" alt="">
{{--                        <img class="detail_img " data-image="/assets/images/Products_img/{{$img['img']}}" src="/assets/images/Products_img/{{$img['img']}}" alt="{{ $image }}">--}}
                    @endif
                @endforeach

            @endif
        </div>

        <div style="margin-top: 93px">
            <button class="button_buy" wire:click="addToCart({{ $product->id }})">Додати в кошик</button>
            <button class="button_chat" wire:click="startConversation({{ $product->user_id }})">Чат з продавцем</button>
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

                    @php
                        $image = '';
                        if(count($item->images) > 0)
                        {
                            $image = $item->images[0]['img'];
                        }
                        else{
                            $image = 'no_image.png';
                        }

                    @endphp

                    <div class="product-item" style="margin-right: 20px;">
                        <img style="width: 145px; height: 250px" src="{{Storage::url($image)}}" alt="">
                        <h3>
                            <a style="text-decoration: none; color: #2E2E2E; font-size: 8px" href="{{ route('product.show', $item->id) }}">
                                {{ $item->name }}
                            </a>
                        </h3>
                        <p style="font-size: 8px">{{ $item->regular_price }} грн</p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>


</div>

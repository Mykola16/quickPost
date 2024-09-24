@section('title')
    Обране
@endsection

<div>
    <h1 class="profile_page_name" >Обране</h1>

    <div>
        @foreach($savedProducts as $product)
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

            <div class="product_list_user" style="height: 200px; margin-top: 35px;">
                <div>
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{Storage::url($image)}}" alt="" style="width:200px;height: 200px">
                    </a>
                </div>
                <div class="my_product_info" style="width: 490px;">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                    <p>{{ $product->short_description }}</p>

                    {{--                    <div class="new">--}}
                    {{--                        <a>Нове</a>--}}
                    {{--                    </div>--}}

                    <div class="street_create">
                        <a>{{ $product->region }}</a>
                    </div>
                </div>
                <div class="product_right_part_user">
                    <div>
                        <p>{{ $product->regular_price }} грн</p>
                    </div>

                    <div class="deleteLike">
                        <h3 wire:click="deleteLike({{ $product->id }})">Прибрати з обраного</h3>
                    </div>


                </div>


            </div>
        @endforeach
    </div>

</div>

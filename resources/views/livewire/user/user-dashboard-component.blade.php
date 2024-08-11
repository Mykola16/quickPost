@section('title')
    USER
@endsection

<div>
    <div style="display: flex">
        <div>
            <h1 class="profile_page_name" >Ваші оголошення</h1>
        </div>

        <button class="create_btn" >
            <a href="{{route('Create')}}"><p>Створити оголошення</p></a>
        </button>

    </div>

    <div style="display: flex">
        <div class="advertisement_menu_item">
            <a href="#"><p>Активні</p></a>
        </div>

        <div class="advertisement_menu_item">
            <a href="#"><p>Очікующі</p></a>
        </div>

        <div class="advertisement_menu_item">
            <a href="#"><p>Неактивні</p></a>
        </div>
    </div>
    <div style="margin-top: 50px">
    @if ($allProducts->isNotEmpty())

        @foreach ($allProducts as $product)

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

            <div class="product_list_user">
                <div>
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{Storage::url($image)}}" alt="">
                    </a>
                </div>
                <div style=" margin-left:20px; margin-top: 20px; width: 600px" >
                    <a  href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                    <p>{{ $product->short_description }}</p>

{{--                    <div class="new">--}}
{{--                        <a>Нове</a>--}}
{{--                    </div>--}}

                    <div class="street_create">
                        <a>Київ, якась там вулиця. 14 черня 2024 </a>
                    </div>
                </div>
                <div class="product_right_part_user">
                    <div >
                        <p>{{ $product->regular_price }} грн</p>
                    </div>

                    <div class="btn_and_like">

                        <div class="con-like">
                            <input class="like" type="checkbox" title="like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">
                                    <polygon class="poly" points="10,10 20,20"></polygon>
                                    <polygon class="poly" points="10,50 20,50"></polygon>
                                    <polygon class="poly" points="20,80 30,70"></polygon>
                                    <polygon class="poly" points="90,10 80,20"></polygon>
                                    <polygon class="poly" points="90,50 80,50"></polygon>
                                    <polygon class="poly" points="80,80 70,70"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


        @endforeach
    @endif

    </div>
</div>



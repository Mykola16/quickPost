@section('title')
    USER
@endsection

<div>




    <div style="display: flex">
        <div>
            <h1 class="profile_page_name">Ваші оголошення</h1>
        </div>

    </div>

    <div style="display: flex">
        <div class="advertisement_menu_item {{ $view === 'list' ? 'Active' : 'inactive' }}" wire:click="$set('view', 'list')">
            <a><p>Активні</p></a>
        </div>

        <div class="advertisement_menu_item {{ $view !== 'list' ? 'Active' : 'inactive' }}" wire:click="$set('view', 'grid')">
            <a><p>Неактивні</p></a>
        </div>

        <button class="create_btn" >
            @if(Auth::user()->utype === 'BSN' || Auth::user()->utype === 'ADM')
                <a href="{{route('Creation')}}"><p>Нове оголошення</p></a>
            @else
                <a href="{{route('Create')}}"><p>Нове оголошення</p></a>
            @endif
        </button>
    </div>
    <div style="margin-top: 50px">

    @if($view === 'list')
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
                <div class="my_product_info">
                    <a  href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                    <p>{{ $product->short_description }}</p>

{{--                    <div class="new">--}}
{{--                        <a>Нове</a>--}}
{{--                    </div>--}}

                    <div class="street_create">
                        <a style="margin-bottom: 30px">{{ $product->region }}</a>
                    </div>
                </div>

                <div>
                    <a href="{{ route('product.edit', $product->id) }}">
                        <div class="pen_edit">
                            <img src="{{ asset('assets/images/note_pencil 1.png') }}" alt="">
                        </div>
                    </a>

                    <div class="ban_delete">
                        <img src="{{ asset('assets/images/ban red 1.png') }}" alt="" wire:click="openDeleteConfirmation({{ $product->id }})">
                    </div>

                    <div class="price_my_prod">
                        <p>{{ $product->regular_price }} грн</p>
                    </div>

                    <div class="count_like"> {{ \App\Models\Like::where('product_id', $product->id)->count() }}</div>


                    <div class="like">
                        <div class="con-like">
                            <div class="checkmark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


        @endforeach
    @endif
    @endif
    @if($view != 'list')

    @endif

        <div>
            <!-- Modal for delete confirmation -->
            @if($showModal)
                <div class="modal5" style="display: flex;">
                    <div class="modal-content5">
                        <span class="close-button5" wire:click="$set('showModal', false)">&times;</span>
                        <h2>Підтвердження видалення</h2>
                        <p>Ви дійсно хочете видалити це оголошення?</p>
                        <button wire:click="deleteAdvertisement">Так, видалити</button>
                        <button wire:click="$set('showModal', false)">Скасувати</button>
                    </div>
                </div>
            @endif
        </div>

    </div>

    <style>
        .product_list_user{
            position: relative;
        }

        .pen_edit img, .ban_delete img{
            width: 30px;
            height: 30px;

            cursor: pointer;
        }

        .pen_edit{
            position: absolute;
            right: 80px;
            top: 20px;
        }

        .ban_delete{
            position: absolute;
            right: 25px;
            top: 20px;
        }

        .price_my_prod{
            position: absolute;
            left: 330px;
            bottom: 67px;
        }

        .price_my_prod p{
            /* 4000 грн */

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            line-height: 100%;
            margin: 0;
        }

        .like{
            width: 45px;
            height: 30px;

            position: absolute;

            right: 25px;
            bottom: 25px;
        }

        .count_like{
            position: absolute;

            width: 30px;
            height: 30px;

            right: 60px;
            bottom: 25px;

            /* 6 */

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            line-height: 100%;
            /* identical to box height, or 24px */

            display: flex;
            justify-content: center; /* Горизонтальное выравнивание */
             align-items: center;     /* Вертикальное выравнивание */
        }

        .modal5 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }
        .modal-content5 {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 500px;
            position: relative;
        }
        .close-button5 {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .modal-content5 button{
            width: 180px;
            height: 40px;

            border-radius: 15px;

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 100%;

            color: #FFFFFF;
        }

        .modal-content5 h2{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 100%;

            color: #000000;
        }

        .modal-content5 p{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;

            color: #000000;
        }

    </style>
</div>



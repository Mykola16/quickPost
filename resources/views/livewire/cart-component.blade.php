<div>


    <div id="myModal2" class="modal-cont" >

        <!-- Modal content -->
        <div class="modal-context">
            <div class="df">
                <img class="cart_img" src="{{asset('assets/images/кошик.png')}}" alt="">
                <div><a>Кошик</a></div>
                <div class="close_div"><img class="close" src="{{asset('assets/images/close.png')}}" alt=""></div>
            </div>


            @if($cartitems->isNotEmpty())
            <div class="cart_product_list">
                    @foreach($cartitems as $item)
                        @php

                            $image = 'no_image.png';
                            if ($item->product && $item->product->images && $item->product->images->count() > 0) {
                                $image = $item->product->images[0]->img;
                            }
                        @endphp


                            <div class="cart_product_item">
                                <img src="{{ Storage::url($image) }}" alt="">
                                <div class="cart_product_name"><p>{{ $item->product->name }}</p></div>
                                <div class="cart_product_price">
                                    <div class="cart_product_menu_btn">
                                        <img wire:click="delete({{ $item }})" src="{{asset('assets/images/delete.png')}}" alt="" onclick="closeModal()">
                                    </div>
                                    <a>{{ $item->product->regular_price }} грн</a>
                                </div>
                            </div>

                    @endforeach
            </div>


            <div class="cart_btn">
                <div class="razom">
                    <a>Разом: {{$total}}.00 грн</a>
                </div>

                <button onclick="location.href='{{route('Oformlennya')}}';" class="button_submit">
                    <a>Оформити замовлення</a>
                </button>
            </div>

            @else
                <div class="cart_empty">
                    <div style="display: flex;justify-content: center;">
                        <img src="{{ asset('favicon.png')}}" alt="">
                    </div>
                    <div style="margin-top: 35px">
                        <a href="">У вас нічого немає!</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>

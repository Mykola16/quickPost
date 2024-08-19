@section('title')
    Оформлення замовленя
@endsection

<div>
    <div class="oformennya_zamovlennya">
        <h1>Оформлення замовленя</h1>

        <div class="oformennya">
            <div class="oformennya_form">
                <div class="form_zamovlennya">
                    <div>
                        <label>Ім’я</label><br>
                        <input><br>
                    </div>
                    <div style="margin-left: 20px">
                        <label>Прізвище</label><br>
                        <input><br>
                    </div>
                </div>

                <div class="form_zamovlennya2">
                    <div>
                        <label>Телефон</label><br>
                        <input placeholder="+380..."><br>
                    </div>
                </div>

                <div class="form_zamovlennya2">
                    <div>
                        <label>Спосіб доставки</label><br>
                        <input placeholder="Нова пошта/Укр пошта"><br>
                    </div>
                </div>

                <div class="form_zamovlennya" style="margin-top: 25px">
                    <div>
                        <label>Область</label><br>
                        <input><br>
                    </div>
                    <div style="margin-left: 20px">
                        <label>№ відділення пошти</label><br>
                        <input><br>
                    </div>
                </div>

                <div class="form_zamovlennya2">
                    <div>
                        <label>Спосіб оплати</label><br>
                        <input placeholder="Visa /При отриманні товару"><br>
                    </div>
                </div>

                <div class="checkmark_zamovlennya">
                    <input type="checkbox">
                    <label>Надіслати звіт на пошту</label><br>
                </div>

                <div class="form_zamovlennya2">
                    <div>
                        <label>Адреса електроної пошти</label><br>
                        <input><br>
                    </div>
                </div>
            </div>

            <div class="oformennya_cart">

                    <!-- Modal content -->
                    <div class="modal-context2" >
                        <div class="df" style="justify-content: center;">
                            <img class="cart_img" src="{{asset('assets/images/кошик.png')}}" alt="">
                            <div><a>Кошик</a></div>
                        </div>

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
                                            <img src="{{asset('assets/images/cart_product_menu_btn.png')}}" alt="">
                                        </div>
                                        <a>{{ $item->product->regular_price }} грн</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="df" style="justify-content: center;">
                            <div class="cart_btn2">
                                <div class="razom2">
                                    <a>Разом: {{$total}}.00 грн</a>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>

        <div class="button_zamovlennya">
            <input type="submit" value="Підтвердити  замовлення">
        </div>


    </div>

</div>

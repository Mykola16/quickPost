@section('title')
    Оформлення замовленя
@endsection

<div>
    <div class="oformennya_zamovlennya">
        <h1>Оформлення замовленя</h1>

        <form wire:submit.prevent="placeOrder">
            <div class="oformennya">
                <div class="oformennya_form">
                    <div class="form_zamovlennya">
                        <div>
                            <label>Ім’я</label><br>
                            <input wire:model="first_name"><br>
                            @error('first_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div style="margin-left: 20px">
                            <label>Прізвище</label><br>
                            <input wire:model="last_name"><br>
                            @error('last_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form_zamovlennya2">
                        <div>
                            <label>Телефон</label><br>
                            <input wire:model="phone" placeholder="+380..."><br>
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form_zamovlennya2">
                        <div>
                            <label>Спосіб доставки</label><br>

                            <div class="NovaPost" onclick="toggleAccordion2(this)">
                                <a>Нова пошта/Укр пошта</a>
                                <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                            </div>

                            <div class="oformlenya_content">
                                <input type="radio" id="novaPost" name="dostavka_method" value="Нова пошта" wire:model="Method_of_delivery">
                                <label for="novaPost" class="checkbox_item">Нова пошта</label><br>
                                <input type="radio" id="ukrPost" name="dostavka_method" value="Укр пошта" wire:model="Method_of_delivery" style="margin-top: 15px">
                                <label for="ukrPost" class="checkbox_item">Укр пошта</label><br>
                            </div>
                            @error('Method_of_delivery') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form_zamovlennya" style="margin-top: 25px">
{{--                        <div>--}}
{{--                            <label>Область</label><br>--}}
{{--                            <input wire:model="Oblast"><br>--}}
{{--                            @error('Oblast') <span class="error">{{ $message }}</span> @enderror--}}
{{--                        </div>--}}

                        <div>
                        <div style="position: relative;" wire:ignore>
                            <label>Область</label><br>
                            <div onclick="selectedRegion(this)" id="menu_item_reg" class="menu-item" style="height: 60px; margin-top: 15px;margin-bottom: 0;border-right: 5px solid #2E2E2E;">
                                <p id="selected-region-text">Оберіть область</p>
                                <img style="margin-right: 15px" src="{{ asset('assets/images/seting_menu_btn.png') }}" alt="">
                            </div>

                            <div class="cont_region" id="cont_region">
                                @foreach ($regions as $region)
                                    <div class="unselected" style="margin-top: 15px" onclick="selectRegion('{{ $region }}')" wire:click="selectRegion('{{ $region }}')">
                                        <a>{{ $region }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('selectedRegion') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div style="margin-left: 20px">
                            <label>№ відділення пошти</label><br>
                            <input wire:model="number_viddilennya"><br>
                            @error('number_viddilennya') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>



                    <div class="form_zamovlennya2">
                        <div>
                            <label>Спосіб оплати</label><br>

                            <div class="SpOplata" onclick="toggleAccordion2(this)">
                                <a>Visa/При отриманні товару</a>
                                <div><img src="{{asset('assets/images/seting_menu_btn.png')}}" alt="123"></div>
                            </div>

                            <div class="oformlenya_content">
                                <input type="radio" id="visa" name="payment_method" value="Visa" wire:model="Method_of_payment">
                                <label for="visa" class="checkbox_item">Visa</label><br>
                                <input type="radio" id="upon_delivery" name="payment_method" value="При отриманні товару" wire:model="Method_of_payment" style="margin-top: 15px">
                                <label for="upon_delivery" class="checkbox_item">При отриманні товару</label><br>
                            </div>
                            @error('Method_of_payment') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="checkmark_zamovlennya">
                        <input wire:model="messagePost" type="checkbox">
                        <label>Надіслати звіт на пошту</label><br>
                        @error('messagePost') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form_zamovlennya2">
                        <div>
                            <label>Адреса електроної пошти</label><br>
                            <input wire:model="email" type="email"><br>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
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
                                        <a>Разом: {{$total}} грн</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
            </div>

            <div class="button_zamovlennya">
                <input type="submit" value="Підтвердити  замовлення">
            </div>
        </form>


    </div>

    <script>
        function selectedRegion(element) {
            const content = element.nextElementSibling;

            const icon = element.querySelector('img');

            if (content.style.display === "block") {
                content.style.display = "none";
                element.style.borderRadius = "5px 5px 5px 5px";


                if (icon) {
                    icon.src = "assets/images/seting_menu_btn.png";
                }

            } else {
                content.style.display = "block";
                element.style.borderRadius = "5px 5px 0 0";
                content.style.borderRadius = "0 0 5px 5px";


                if (icon) {
                    icon.src = "assets/images/btn_v_setting.png";
                }
            }
        }

        function selectRegion(region) {


            // Зміна тексту вибраної області
            document.getElementById('selected-region-text').textContent = region;
            var content = document.getElementById("cont_region");
            var content3 = document.getElementById("menu_item_reg");

            content.style.display = "none";
            content3.style.borderRadius = "5px 5px 5px 5px";
        }


    </script>
</div>

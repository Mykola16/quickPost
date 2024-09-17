@section('title')
    Головна
@endsection

<div>
    <h1>Головна</h1>


    <div class="home_admin">
        <div class="df">
            <div>
                <h3>Нові</h3>
                <div class="new_static">
                    <div class="df" style="align-items: center; margin-bottom: 27px">
                        <img src="{{asset('assets/images/Admin_img/Paper-Plane 1.png')}}" alt="">
                        <p>Нові оголошення</p>
                        <a>+{{count($products)}}</a>
                    </div>
                    <div class="df" style="align-items: center; margin-bottom: 25px">
                        <img src="{{asset('assets/images/Admin_img/people 1.png')}}" alt="" style="height:22px">
                        <p>Нові користувачі</p>
                        <a>+{{count($users)}}</a>
                    </div>
                    <div class="df" style="align-items: center;">
                        <img src="{{asset('assets/images/Admin_img/review 1.png')}}" alt="">
                        <p>Нові відгуки</p>
                        <a>0</a>
                    </div>
                </div>

                <h3>Замовлення</h3>
                <div class="zamov_static">
                    <div class="df" style="margin-top:28px">
                        <p>Активні</p>
                        <a>0</a>
                    </div>

                    <div class="df" style="margin-top:20px">
                        <p>Очікующі</p>
                        <a>0</a>
                    </div>

                    <div class="df" style="margin-top:21px">
                        <p>Доставлені</p>
                        <a>0</a>
                    </div>
                </div>
            </div>

            <div style="margin-left: 60px">
                <h3 style="margin-bottom: 19px">Нещодавно оприлюднені</h3>

                <div class="Newly_add">
                    @foreach($products  as $product)
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

                        <div class="product_list_admin" style="margin-bottom: 10px">
                            <div>
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img src="{{Storage::url($image)}}" alt="">
                                </a>
                            </div>
                            <div class="my_product_info">
                                <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                <p>{{ $product->short_description }}</p>

                                <div class="street_create">
                                    <h3>{{ $product->region }}</h3>
                                </div>
                            </div>
                            <div class="product_right_part_user">
                                <div>
                                    <p>{{ $product->regular_price }} грн</p>
                                </div>
                            </div>


                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

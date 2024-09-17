@section('title')
    {{ $category->name ?? 'Будь-яка категорія'}}
@endsection

<div>

    <div id="message" class="alert">
        Товар додано до кошика!
    </div>

    @livewire('search')


    <div class="Categories">

            <h3>Фільтри</h3>

            <div style="display: flex">
                <p>Категорія</p>

                <p style="margin-left: 208px">Шукати в області</p>

                <p style="margin-left: 112px">Ціна</p>

                <p style="margin-left: 272px">Стан</p>
            </div>

            <div  style="display: flex">
                <div  class="menu"  id="myBtn">
                    <div   class="menu-item" style=" height: 40px" >
                        <p>{{ $category->name ?? 'Будь-яка категорія'}}</p>
                        <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">
                    </div>
                </div>

                <div   class="menu-item" style="margin-left: 20px;height: 40px" >
                    <p>Оберіть область</p>
                    <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">
                </div>

                <div id="myModal" class="modal" style="padding-top: 375px;" >
                    <div class="modal-content" style="display: flex" >

                        <div class="category-column">
                            <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                                <a href="{{ route('categories.index') }}"><p>Будь-яка категорія</p></a>

                                <img src="{{ asset('assets/images/button_cat.png') }}" alt="">

                            </div>

                            @foreach ($categories as $category)

                                <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                                    <a href="{{ route('categories.show', $category) }}"><p>{{ $category->name }}</p></a>

                                    <img src="{{ asset('assets/images/button_cat.png') }}" alt="">

                                </div>

                            @endforeach
                        </div>



                        <div class="submenu-column">
                            @foreach ($categories as $category)

                                <ul id="subcategories-{{ $category->id }}" class="subcategories" style="display: none;">

                                    @foreach ($category->subCategories as $subCategory)

                                        <a href="{{ route('categories.show', $subCategory) }}"><li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li></a>

                                        @if ($subCategory->subCategories->isNotEmpty())
                                            <ul >
                                                @foreach ($subCategory->subCategories as $subSubCategory)

                                                    <a href="{{ route('categories.show', $subSubCategory) }}"><li style="margin-bottom: 17px"  class="subSubCategory">{{ $subSubCategory->name }}</li></a>

                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>




                <input style="margin-left: 20px" class="sort_price" type="text" name="text" id="input" placeholder="від">
                <input style="margin-left: 30px" class="sort_price" type="text" name="text" id="input" placeholder="до">


                <div  class="menu">

                    <div   class="menu-item" style="height: 40px; margin-left: 20px">
                        <p>Всі оголошення</p>

                        <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">

                    </div>

                </div>



            </div>

            <div class="type_advertisement">
                <h3 class="type_active" style="padding-bottom: 5px;">Всі оголошення</h3>
                <h3>Приватні</h3>
                <h3>Бізнес</h3>
            </div>

            <div class="" style="display: flex; margin-top: 15px">
                <div class="page_link">
                    <a>Головна/Одяг та взуття/Чоловічий одяг</a>
                </div>

                <div class="sort_menu">
                    <div>
                        <h4>Сортувати за</h4>
                    </div>

                    <div  class="menu">

                        <div   class="menu-item" style="height: 40px; margin: 0;">
                            <p>Рекомендоване вам</p>

                            <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">

                        </div>

                    </div>


                </div>

                <div wire:click="$set('view', 'list')" class="list_product">
                    <img
                        src="{{ $view === 'list' ? asset('assets/images/list_active.png') : asset('assets/images/list.png') }}"
                        alt=""
                    >
                </div>

                <div wire:click="$set('view', 'grid')" class="block_product">
                    <img
                        src="{{ $view === 'grid' ? asset('assets/images/block_active.png') : asset('assets/images/block.png') }}"
                        alt=""
                    >
                </div>

                <div class="currencies">
                    <a>Валюта</a>
                </div>

                <div  class="hryvnia active_valut">
                    <a>₴</a>
                </div>

                <div  class="dollar">
                    <a>$</a>
                </div>

                <div  class="euro">
                    <a>€</a>
                </div>
            </div>

            <div style="margin-top: 50px;">
                @if(count($products) < 4 && count($products) > 0  )
                    <h3 class="count">Ми знайшли {{count($products)}} оголошеня</h3>

                @elseif(count($products) == 0)
                    <h3 class="count">Ми знайшли {{count($products)}} оголошень</h3>
                @else
                    <h3 class="count">Ми знайшли {{count($products)}} оголошень</h3>
                @endif
            </div>

{{--        Ми знайшли понад 2000 оголошень--}}

        </div>


    @if ($products->isNotEmpty())

            @foreach ($products as $product)

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

            @if($view === 'list')

                <div class="product_list">
                    <div >
                        <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{Storage::url($image)}}" alt="">
    {{--                        <img src="/laravel/storage/app/public/photos/{{$image}}" alt="">--}}
                        </a>
                    </div>
                    <div style=" margin-left:20px; margin-top: 20px; width: 600px" >
                        <a  href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                        <p>{{ $product->short_description }}</p>

                        <div class="new">
                            <a>Нове</a>
                        </div>

                        <div class="street">
                            <a>Київ, якась там вулиця. 14 черня 2024 </a>
                        </div>
                    </div>
                    <div class="product_right_part">
                        <div >
                            <p>{{ $product->regular_price }} грн</p>
                        </div>

                        <div class="btn_and_like" wire:ignore>
                            <div id="showMessageButton" style=" height: 65px" wire:click="addToCart({{ $product->id }})">
                                <div class="shop_btn">
                                    <a>Додати в кошик</a>
                                    <img src="{{ asset('assets/images/shop_icon.png') }}" alt="">
                                </div>
                            </div>

                            @livewire('product-like', ['productId' => $product->id])

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
            @if($view != 'list')


                    <div class="df" >
                        <div class="Vip_product_items df" style="margin-top: 0;">
                            @foreach($products as $item)
                                <div class="Vip-product-item">

{{--                                    <div class="Vip_btn">--}}
{{--                                        <p>Vip</p>--}}
{{--                                    </div>--}}

                                    <a href="{{ route('product.show', $item->id) }}">
                                        <img src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">
                                    </a>

                                    <div class="Vip-product-item-info">
                                        <div class="df"  wire:ignore>
                                            <div style="width: 240px; height: 60px;" >
                                                <a href="{{ route('product.show', $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </div>

                                            @livewire('product-like-vip', ['productId' => $item->id])
                                        </div>

                                        <div class="df">
                                            <p>{{ $item->regular_price }} грн</p>

                                            <div class="rating-result">
                                                <span class="active"></span>
                                                <span class="active"></span>
                                                <span class="active"></span>
                                                <span class="active"></span>
                                                <span class="active"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

            @endif



    @endif

</div>




{{--    <div class="Categories">--}}
{{--    <h1>{{ $category->name }}</h1>--}}


{{--        @if ($subCategories->isNotEmpty())--}}
{{--            <ul>--}}
{{--                @foreach ($subCategories as $subCategory)--}}
{{--                    <li class="cat-text">--}}
{{--                        <a class="cat_a"  href="{{ route('categories.show', $subCategory) }}">{{ $subCategory->name }}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}


{{--        @endif--}}

{{--        <div class="cat_esc">--}}
{{--            <a class="cat_a" href="{{ route('categories.index') }}">Назад до категорій</a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--        @if ($products->isNotEmpty())--}}
{{--            <h2>Товари</h2>--}}
{{--            <ul>--}}
{{--                @foreach ($products as $product)--}}
{{--                    <li style="list-style: none">--}}

{{--                        @php--}}
{{--                            $image = '';--}}
{{--                            if(count($product->images) > 0)--}}
{{--                            {--}}
{{--                                $image = $product->images[0]['img'];--}}
{{--                            }--}}
{{--                            else{--}}
{{--                                $image = 'no_image.png';--}}
{{--                            }--}}

{{--                        @endphp--}}

{{--                        <img style="width: 310px" src="/assets/images/Products_img/{{ $image }}" alt="{{ $image }}">--}}
{{--                        <h3><a style="text-decoration: none; color: #2E2E2E;" href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>--}}
{{--                        <p>{{ $product->short_description }}</p>--}}
{{--                        <p>Ціна: {{ $product->regular_price }} грн</p>--}}
{{--                        <p>--------------------------------------------------------------------</p>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}




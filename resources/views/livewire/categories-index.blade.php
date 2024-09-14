{{--@section('title')--}}
{{--    Категорії--}}
{{--@endsection--}}

{{--<div>--}}

{{--    @livewire('search')--}}

{{--    <div class="Categories">--}}

{{--        <h3>Фільтри</h3>--}}

{{--        <div style="display: flex">--}}
{{--            <p>Категорія</p>--}}

{{--            <p style="margin-left: 538px">Ціна</p>--}}

{{--            <p style="margin-left: 272px">Стан</p>--}}
{{--        </div>--}}

{{--        <div  style="display: flex">--}}


{{--            <div  class="menu"  id="myBtn">--}}
{{--                <div   class="menu-item" style=" height: 40px" >--}}
{{--                    <p>{{ $category->name ?? 'Будь-яка категорія'}}</p>--}}
{{--                    <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">--}}
{{--                </div>--}}
{{--                <div id="myModal" class="modal" style="padding-top: 375px;" >--}}
{{--                    <div class="modal-content" style="display: flex" >--}}

{{--                        <div class="category-column">--}}
{{--                            <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">--}}
{{--                                <a href="{{ route('categories.index') }}"><p>Будь-яка категорія</p></a>--}}

{{--                                <img src="{{ asset('assets/images/button_cat.png') }}" alt="">--}}

{{--                            </div>--}}

{{--                            @foreach ($categories as $category)--}}

{{--                                <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">--}}
{{--                                    <a href="{{ route('categories.show', $category) }}"><p>{{ $category->name }}</p></a>--}}

{{--                                    <img src="{{ asset('assets/images/button_cat.png') }}" alt="">--}}

{{--                                </div>--}}

{{--                            @endforeach--}}
{{--                        </div>--}}



{{--                        <div class="submenu-column">--}}
{{--                            @foreach ($categories as $category)--}}

{{--                                <ul id="subcategories-{{ $category->id }}" class="subcategories" style="display: none;">--}}

{{--                                    @foreach ($category->subCategories as $subCategory)--}}

{{--                                        <a href="{{ route('categories.show', $subCategory) }}"><li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li></a>--}}

{{--                                        @if ($subCategory->subCategories->isNotEmpty())--}}
{{--                                            <ul >--}}
{{--                                                @foreach ($subCategory->subCategories as $subSubCategory)--}}

{{--                                                    <a href="{{ route('categories.show', $subSubCategory) }}"><li style="margin-bottom: 17px"  class="subSubCategory">{{ $subSubCategory->name }}</li></a>--}}

{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}


{{--            <input style="margin-left: 350px" class="sort_price" type="text" name="text" id="input" placeholder="від">--}}
{{--            <input style="margin-left: 30px" class="sort_price" type="text" name="text" id="input" placeholder="до">--}}


{{--            <div  class="menu">--}}

{{--                <div   class="menu-item" style="height: 40px; margin-left: 20px">--}}
{{--                    <p>Всі оголошення</p>--}}

{{--                    <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">--}}

{{--                </div>--}}

{{--            </div>--}}



{{--        </div>--}}

{{--        <div class="type_advertisement">--}}
{{--            <h3 class="type_active" style="padding-bottom: 5px;">Всі оголошення</h3>--}}
{{--            <h3>Приватні</h3>--}}
{{--            <h3>Бізнес</h3>--}}
{{--        </div>--}}

{{--        <div class="" style="display: flex; margin-top: 15px">--}}
{{--            <div class="page_link">--}}
{{--                <a>Головна/Одяг та взуття/Чоловічий одяг</a>--}}
{{--            </div>--}}

{{--            <div style="">--}}
{{--                <div>--}}
{{--                    <h4>Сортувати за</h4>--}}
{{--                </div>--}}

{{--                <div  class="menu">--}}

{{--                    <div   class="menu-item" style="height: 40px; margin: 0;">--}}
{{--                        <p>Рекомендоване вам</p>--}}

{{--                        <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">--}}

{{--                    </div>--}}

{{--                </div>--}}


{{--            </div>--}}

{{--            <div wire:click="$set('view', 'list')" class="list_product">--}}
{{--                <img--}}
{{--                    src="{{ $view === 'list' ? asset('assets/images/list_active.png') : asset('assets/images/list.png') }}"--}}
{{--                    alt="">--}}
{{--            </div>--}}

{{--            <div wire:click="$set('view', 'grid')" class="block_product">--}}
{{--                <img--}}
{{--                    src="{{ $view === 'grid' ? asset('assets/images/block_active.png') : asset('assets/images/block.png') }}"--}}
{{--                    alt="" >--}}
{{--            </div>--}}

{{--            <div class="currencies">--}}
{{--                <a>Валюта</a>--}}
{{--            </div>--}}

{{--            <div  class="hryvnia">--}}
{{--                <a>₴</a>--}}
{{--            </div>--}}

{{--            <div  class="dollar">--}}
{{--                <a>$</a>--}}
{{--            </div>--}}

{{--            <div  class="euro">--}}
{{--                <a>€</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div style="margin-top: 50px;">--}}
{{--            <h3 class="count">Ми знайшли понад 2000 оголошень</h3>--}}
{{--        </div>--}}

{{--    </div>--}}


{{--    @if ($products->isNotEmpty())--}}

{{--        @foreach ($products as $product)--}}

{{--            @php--}}
{{--                $image = '';--}}
{{--                if(count($product->images) > 0)--}}
{{--                {--}}
{{--                    $image = $product->images[0]['img'];--}}
{{--                }--}}
{{--                else{--}}
{{--                    $image = 'no_image.png';--}}
{{--                }--}}

{{--            @endphp--}}

{{--            @if($view === 'list')--}}

{{--                <div class="product_list">--}}
{{--                    <div >--}}
{{--                        <a href="{{ route('product.show', $product->id) }}">--}}
{{--                            <img src="{{Storage::url($image)}}" alt="">--}}
{{--                            --}}{{--                        <img src="/laravel/storage/app/public/photos/{{$image}}" alt="">--}}
                                                                            /laravel/storage/app/public/photos/
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div style=" margin-left:20px; margin-top: 20px; width: 600px" >--}}
{{--                        <a  href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>--}}
{{--                        <p>{{ $product->short_description }}</p>--}}

{{--                        <div class="new">--}}
{{--                            <a>Нове</a>--}}
{{--                        </div>--}}

{{--                        <div class="street">--}}
{{--                            <a>Київ, якась там вулиця. 14 черня 2024 </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="product_right_part">--}}
{{--                        <div >--}}
{{--                            <p>{{ $product->regular_price }} грн</p>--}}
{{--                        </div>--}}

{{--                        <div class="btn_and_like">--}}
{{--                            <div style=" height: 65px" wire:click="addToCart({{ $product->id }})">--}}
{{--                                <div class="shop_btn">--}}
{{--                                    <a>Додати в кошик</a>--}}
{{--                                    <img src="{{ asset('assets/images/shop_icon.png') }}" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="con-like">--}}
{{--                                <input class="like" type="checkbox" title="like">--}}
{{--                                <div class="checkmark">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">--}}
{{--                                        <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">--}}
{{--                                        <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>--}}
{{--                                    </svg>--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">--}}
{{--                                        <polygon class="poly" points="10,10 20,20"></polygon>--}}
{{--                                        <polygon class="poly" points="10,50 20,50"></polygon>--}}
{{--                                        <polygon class="poly" points="20,80 30,70"></polygon>--}}
{{--                                        <polygon class="poly" points="90,10 80,20"></polygon>--}}
{{--                                        <polygon class="poly" points="90,50 80,50"></polygon>--}}
{{--                                        <polygon class="poly" points="80,80 70,70"></polygon>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        @if($view != 'list')--}}


{{--            <div class="df" >--}}
{{--                <div class="Vip_product_items df" style="margin-top: 0;">--}}
{{--                    @foreach($products as $item)--}}
{{--                        <div class="Vip-product-item">--}}

{{--                            --}}{{--                                    <div class="Vip_btn">--}}
{{--                            --}}{{--                                        <p>Vip</p>--}}
{{--                            --}}{{--                                    </div>--}}

{{--                            <a href="{{ route('product.show', $item->id) }}">--}}
{{--                                <img src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">--}}
{{--                            </a>--}}

{{--                            <div class="Vip-product-item-info">--}}
{{--                                <div class="df">--}}
{{--                                    <div style="width: 240px; height: 60px;" >--}}
{{--                                        <a href="{{ route('product.show', $item->id) }}">--}}
{{--                                            {{ $item->name }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                    <div class="vip-con-like">--}}
{{--                                        <input class="like" type="checkbox" title="like">--}}
{{--                                        <div class="checkmark">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">--}}
{{--                                                <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>--}}
{{--                                            </svg>--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="filled" viewBox="0 0 24 24">--}}
{{--                                                <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z"></path>--}}
{{--                                            </svg>--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" class="celebrate">--}}
{{--                                                <polygon class="poly" points="10,10 20,20"></polygon>--}}
{{--                                                <polygon class="poly" points="10,50 20,50"></polygon>--}}
{{--                                                <polygon class="poly" points="20,80 30,70"></polygon>--}}
{{--                                                <polygon class="poly" points="90,10 80,20"></polygon>--}}
{{--                                                <polygon class="poly" points="90,50 80,50"></polygon>--}}
{{--                                                <polygon class="poly" points="80,80 70,70"></polygon>--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="df">--}}
{{--                                    <p>{{ $item->regular_price }} грн</p>--}}

{{--                                    <div class="rating-result">--}}
{{--                                        <span class="active"></span>--}}
{{--                                        <span class="active"></span>--}}
{{--                                        <span class="active"></span>--}}
{{--                                        <span class="active"></span>--}}
{{--                                        <span class="active"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        @endif--}}



{{--    @endif--}}


{{--    <div class="all-products">--}}
{{--        <div class="product-rec">--}}
{{--            @foreach($allProducts as $item)--}}

{{--                <div class="product-item">--}}
{{--                    <a href="{{ route('product.show', $item->id) }}">--}}
{{--                        <img  src="{{ Storage::url($item->images->first()->img ?? 'no_image.png') }}" alt="">--}}
{{--                    </a>--}}
{{--                    <div class="product-item-info">--}}
{{--                        <a href="{{ route('product.show', $item->id) }}">--}}
{{--                            {{ $item->name }}--}}
{{--                        </a>--}}
{{--                        <p style="font-size: 14px;">{{ $item->regular_price }} грн</p>--}}
{{--                    </div>--}}
{{--                    <div class="product-item-zat">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</div>--}}

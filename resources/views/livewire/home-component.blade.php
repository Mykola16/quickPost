@section('title')
    Головна
@endsection

<div>
    <div class="content">
        <div class="search">
            <input type="text" name="text" id="input" placeholder="Що шукаєте?" autocomplete="off" autocorrect="off">
            <label for="input">
                <img class="micIcon" src="{{ ('assets/images/mic_icon.png')}}" alt="mic_icon">
            </label>
        </div>

        <div class="search_map">
            <input type="text" name="text" class="input" id="input" placeholder="Вся Україна" autocomplete="off" autocorrect="off">
            <label for="input">
                <img src="{{ asset('assets/images/map.png')}}" alt="search__icon">
            </label>
        </div>

        <div class="btn">
            <button class="button_search" type="submit">
                <p>Пошук</p>
                <img src="{{ asset('assets/images/search_icon.png')}}" alt="search_icon">
            </button>
        </div>
    </div>

{{--    @livewire('categories-list')--}}





    <div class="line1">

        <div class="category" style="overflow: hidden">

                <div class="menu"  id="myBtn">
                    @foreach ($categories as $category)

                        <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                            <p>{{ $category->name }}</p>

                            <img src="{{ asset('assets/images/button_cat.png') }}" alt="">

                        </div>
                    @endforeach
                </div>

                <div id="myModal" class="modal" >

                        <div class="modal-content" style="display: flex">

                            <div class="category-column">
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

                                            <a href="{{ route('categories.show', $subCategory) }}"><li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li>

                                            @if ($subCategory->subCategories->isNotEmpty())
                                                <ul >
                                                    @foreach ($subCategory->subCategories as $subSubCategory)

                                                        <a href="{{ route('categories.show', $subSubCategory) }}"><li style="margin-left: 20px" class="subSubCategory">{{ $subSubCategory->name }}</li></a>

                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>


        </div>





        <div class="slider1" id="blockSlider">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер1.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер2.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 3</div> -->
                    <img src="{{ asset('assets/images/slider/постер6.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Three</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер1.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер2.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 3</div> -->
                    <img src="{{ asset('assets/images/slider/постер6.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Three</div> -->
                </div>






            <div>


                <a class="prev" onclick="plusSlides(-1)"><img src="{{ asset('assets/images/slider/button1.png')}}" alt="button1"></a>
                <a class="next" onclick="plusSlides(1)"><img src="{{ asset('assets/images/slider/button2.png')}}" alt="button2"></a>


                <div class="dot_div">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    <span class="dot" onclick="currentSlide(5)"></span>
                    <span class="dot" onclick="currentSlide(6)"></span>
                </div>


            </div>

        </div>
    </div>
    </div>



    <div class="box">
        <img src="{{ asset('favicon.png')}}" alt="">
        <p>Текст</p>
    </div>



</div>

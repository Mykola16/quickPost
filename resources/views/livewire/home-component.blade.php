@section('title')
    Головна
@endsection

<div>
    @livewire('search')

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

                <div id="myModal" class="modal" style="display: none;" >

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

                                            <a href="{{ route('categories.show', $subCategory) }}"><li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li></a>

                                            @if ($subCategory->subCategories->isNotEmpty())
                                                <ul >
                                                    @foreach ($subCategory->subCategories as $subSubCategory)

                                                        <a href="{{ route('categories.show', $subSubCategory) }}"><li style="margin-bottom: 17px" class="subSubCategory">{{ $subSubCategory->name }}</li></a>

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
                    <img src="{{ asset('assets/images/slider/постер3.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Three</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер4.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер5.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 3</div> -->
                    <img src="{{ asset('assets/images/slider/постер3.png')}}" style="width:100%" alt="постер">
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

    @livewire('product-home-page')


    <div class="box">
        <a href="https://t.me/Mashavaskul"><img src="{{ asset('favicon.png')}}" alt=""></a>

        <p>
            Вітаю! Я ваш дружній помічник. Якщо у вас виникли питання або потрібна допомога, просто натисніть на мене.
            Ми завжди раді допомогти вам і відповісти на всі ваші запитання. Давайте разом зробимо ваш досвід ще приємнішим!
        </p>
    </div>


    <script>
        const scrollContainer = document.querySelector('.bigness_product');
        const scrollContainer2 = document.querySelector('.all-products');

        scrollContainer.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });

        scrollContainer2.addEventListener('wheel', (evt) => {
            evt.preventDefault();
            scrollContainer2.scrollLeft += evt.deltaY;
        });


    </script>

</div>

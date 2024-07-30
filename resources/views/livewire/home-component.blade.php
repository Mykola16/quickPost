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
        <div class="category">




{{--                <select class="dropdown-select"  style="margin-bottom: 10px">--}}
{{--                    <option value="">Краса та здоров’я</option>--}}
{{--                </select>--}}
            <div>
                @foreach ($categories as $category)
                    <select class="dropdown-select" style="margin-bottom: 10px">
                        <option class="cat_a" href="{{ route('categories.show', $category) }}">{{ $category->name }}</option>
                        @if ($category->subCategories->isNotEmpty())
                            @foreach ($category->subCategories as $subCategory)
                                <option class="cat_a">{{ $subCategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                @endforeach
            </div>



{{--            <div style="margin-top: 50px;">--}}
{{--                <a  class="cat_a"  href="{{route('categories.index')}}">Categories</a>--}}
{{--            </div>--}}






        </div>

        <div class="slider1" id="blockSlider">
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер6.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер1.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 3</div> -->
                    <img src="{{ asset('assets/images/slider/постер2.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Three</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер6.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Text</div> -->
                </div>

                <div class="mySlides fade">
                    <img src="{{ asset('assets/images/slider/постер1.png')}}" style="width:100%" alt="постер">
                    <!-- <div class="text">Caption Two</div> -->
                </div>

                <div class="mySlides fade" style="width:100%">
                    <img src="{{ asset('assets/images/slider/постер2.png')}}" alt="постер">
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
        <img src="{{ asset('favicon.png')}}">
        <p>Текст</p>
    </div>



</div>

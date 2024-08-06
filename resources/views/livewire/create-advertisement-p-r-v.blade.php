@section('title')
    Create
@endsection

<div>
    <div class="create_page">
        <form>
            <h1>Створити Оголошення</h1>


            <div style="display: flex">

                <div class="create_content">

                    <label>Вкажіть назву</label><br>
                    <input type="text" name="name"><br>


                    {{--потім змінити норм зробити)--}}
                    <div style="display: flex; margin-top: 35px">
                        <div>
                            <label>Вкажіть категорію</label><br>

                            <div  class="menu"  id="myBtn">

                                <div   class="menu-item" style=" height: 40px; margin-top: 15px" >
                                    <p>Категорія</p>

                                    <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">

                                </div>


                                <div id="myModal" class="modal" style="padding-top: 375px;" >

                                    <div class="modal-content" style="display: flex" >

                                        <div class="category-column">
                                            @foreach ($categories as $category)

                                                <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                                                    <a href="#"><p>{{ $category->name }}</p></a>

                                                    <img src="{{ asset('assets/images/button_cat.png') }}" alt="">

                                                </div>

                                            @endforeach
                                        </div>

                                        <div class="submenu-column">
                                            @foreach ($categories as $category)

                                                <ul id="subcategories-{{ $category->id }}" class="subcategories" style="display: none;">

                                                    @foreach ($category->subCategories as $subCategory)

                                                        <a href="#"><li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li></a>

                                                        @if ($subCategory->subCategories->isNotEmpty())
                                                            <ul >
                                                                @foreach ($subCategory->subCategories as $subSubCategory)

                                                                    <a href="#"><li style="margin-bottom: 17px"  class="subSubCategory">{{ $subSubCategory->name }}</li></a>

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

                        </div>

                        {{--потім змінити норм зробити)--}}
                        <div style="margin-left: 20px">
                            <label>Місцезнаходження</label><br>

                            <div   class="menu-item" style=" height: 40px; margin-top: 15px" >
                                <p>Оберіть місто</p>

                                <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">

                            </div>
                        </div>


                    </div>

                    {{--потім змінити норм зробити)--}}
{{--                    placeholder="Коротко опишіть ваш товар"--}}
                    <div style="margin-top: 35px" >
                        <label>Короткий опис</label><br>
                        <input type="text" name="name"  style="height: 90px"><br>
                    </div>



                    <div style="margin-top: 35px" >
                        <label>Опис</label><br>
                        <input type="text" name="name"  style="height: 250px"><br>
                    </div>
                </div>



                <div class="create_content">
                    <div style="margin-left: 20px">
                        <label>Фото</label><br>

                        <div style="display: flex">
                            {{--потім змінити норм зробити)--}}
                            <div class="img_box"><p>Додати фото</p></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="1"></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="2"></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="3"></div>

                        </div>

                        {{--потім змінити норм зробити)--}}
                        <div style="display: flex; margin-top: 20px">
                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="4"></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="5"></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="6"></div>

                            <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="7"></div>

                        </div>

                        <div style="display: flex; margin-top: 35px">
                            <div>
                                <label>Посилання на</label> <br>     {{--потім змінити норм зробити)--}}
                                <label>відео огляд (якщо є)</label>
                                <input type="url" name="name"  style="width: 310px; height: 50px"><br>
                            </div>

                            <div style="margin-left: 20px">
                                <label>.</label><br>                                {{--потім змінити норм зробити)--}}
                                <label>Контактні данні</label>
                                <input type="tel" name="name"  style=" width: 310px; height: 50px"><br>
                            </div>

                        </div>

                        {{--css потім змінити норм зробити)--}}
                        <div style="margin-top: 35px">
                            <input style="margin: 0;padding: 0; width: 20px; height: 20px " type="checkbox">
                            <label>Помітити як “VIP” </label><br>
                            <label style="color: #A1A1A1;">Тільки з підпискою QuickPlus</label>
                        </div>

                        <button class="create_btn" style="width: 310px; height: 60px; margin-top: 52px" >
                            <a href="#"><p>Опублікувати</p></a>
                        </button>

                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

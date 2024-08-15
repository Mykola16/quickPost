@section('title')
    Create
@endsection

<div>
    <div class="create_page">
        <form wire:submit.prevent="savedata">
            <h1>Створити Оголошення</h1>

            <div style="display: flex">

                <div class="create_content">

                    <label>Вкажіть назву</label><br>
                    <input type="text" wire:model="name" required><br>

                    <div style="display: flex; margin-top: 35px">
                        <div>
                            <label>Вкажіть категорію</label><br>
                            <div class="menu" id="myBtn">
                                <div class="menu-item" style="height: 40px; margin-top: 15px">
                                    <p id="selectedCategory">{{ $selectedCategoryName ?? 'Категорія' }}</p>
                                    <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">
                                </div>

                            </div>

                                <div id="myModal" class="modal" style="padding-top: 375px;">
                                    <div class="modal-content" style="display: flex">
                                        <div class="category-column">
                                            @foreach ($categories as $category)

                                                <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                                                    <a href="#{{$category->id}}" data-category-id="{{ $category->id }}" wire:click="selectCategory('{{ $category->id  }}')" onclick="closeModal()">
                                                        <p>{{ $category->name }}</p></a>
                                                    <img src="{{ asset('assets/images/button_cat.png') }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="submenu-column">
                                            @foreach ($categories as $category)
                                                <ul id="subcategories-{{ $category->id }}" class="subcategories" style="display: none;">
                                                    @foreach ($category->subCategories as $subCategory)
                                                        <a href="#" wire:click="selectCategory('{{ $subCategory->id  }}')"  onclick="closeModal()">
                                                            <li style="margin-bottom: 10px" class="subCategory">{{ $subCategory->name }}</li>
                                                        </a>
                                                        @if ($subCategory->subCategories->isNotEmpty())
                                                            <ul>
                                                                @foreach ($subCategory->subCategories as $subSubCategory)
                                                                    <a href="#" wire:click="selectCategory('{{ $subSubCategory->id  }}')"  onclick="closeModal()">
                                                                        <li style="margin-bottom: 17px" class="subSubCategory">{{ $subSubCategory->name }}</li>
                                                                    </a>
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

                        <div style="margin-left: 20px">
                            <label>Місцезнаходження</label><br>
                            <div class="menu-item" style="height: 40px; margin-top: 15px">
                                <p>Оберіть місто</p>
                                <img style="margin-right: 15px" src="{{ asset('assets/images/down_arrow.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 35px">
                        <label>Короткий опис</label><br>
                        <textarea type="text" wire:model="short_description"
                                  required style="height: 90px;margin-top:15px" placeholder="Коротко опишіть ваш товар"></textarea><br>
                    </div>

                    <div style="margin-top: 35px">
                        <label>Опис</label><br>
                        <textarea type="text" wire:model="description" required
                                  style="height: 250px;margin-top:15px;" placeholder="Опишіть ваш товар"></textarea><br>
                    </div>

                    <!-- Скрытое поле для category_id -->
                    <input type="hidden" id="categoryIdField" name="category_id" wire:model="category_id">
                    <!-- Скрытое поле для user_id -->
                    <input type="hidden" id="user_id" name="user_id" wire:model="user_id">



                </div>

                <div class="create_content">
                    <div style="margin-left: 20px">
                        <label>Фото</label><br>
                        <div class="img_boxes">
                            <div style="display: flex">
                                <div class="img_box">
                                    @if($img)
                                        <div style="display: flex; flex-wrap: wrap;">
                                            @foreach($img as $photo)
                                                <img class="file_img" src="{{ $photo->temporaryUrl() }}" alt="">
                                            @endforeach
                                        </div>
                                    @else
                                        <input type="file" wire:model="img" id="fileInput" multiple style="display: none;">
                                        <label for="fileInput" class="file-upload-button"><p>Додати фото</p></label>
                                    @endif
                                </div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="1"></div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="2"></div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="3"></div>
                            </div>

                            <div style="display: flex; margin-top: 20px">
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="4"></div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="5"></div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="6"></div>
                                <div style="background-color: #EFEFEF" class="img_box"><img src="{{ asset('assets/images/кам.png') }}" alt="7"></div>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div class="price_create">
                                <label>Ціна</label><br>
                                <input type="number" wire:model="regular_price" required><br>

                                <div class="vip_create">
                                    <input type="checkbox">
                                    <label class="vip_create_item">Помітити як “VIP”</label><br>
                                    <label class="QuickPlus_create_item">Тільки з підпискою QuickPlus</label>
                                </div>
                            </div>

                            <div class="info_create">
                                <label>Контактні данні</label><br>
                                <input type="number" placeholder="Номер телефону"><br>

                                <div style="margin-top:35px">
                                    <label>Посилання на відео огляд (якщо є)</label><br>
                                    <input type="number" placeholder="youtube посилання"><br>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="button_create">
                            <p>Опублікувати</p>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@section('title')
    Edit
@endsection

<div>
    <div class="create_page">
        <form wire:submit.prevent="savedata">
            <h1 style="width: 50%">Редагувати Оголошення</h1>

            <div style="display: flex">

                <div class="create_content">

                    <label>Вкажіть назву</label><br>
                    <input type="text" wire:model="name" required><br>

                    <div style="display: flex; margin-top: 35px">
                        <div>
                            <label>Вкажіть категорію</label><br>
                            <div class="menu" id="myBtn">
                                <div class="menu-item" style="height: 40px; margin-top: 15px; border-right: 5px solid #2E2E2E;">
                                    <p id="selectedCategory" style="{{ $selectedCategoryName ? 'color: #2E2E2E;' : 'color: #A1A1A1;' }}">{{ $selectedCategoryName ?? 'Категорія' }}</p>
                                    <img style="margin-right: 15px" src="{{ asset('assets/images/seting_menu_btn.png') }}" alt="">
                                </div>

                            </div>

                            <div id="myModal" class="modal" style="padding-top: 375px;">
                                <div class="modal-content" style="display: flex">
                                    <div class="category-column">
                                        @foreach ($categories as $category)

                                            <div class="menu-item" data-category-id="{{ $category->id }}" onclick="showSubCategories({{ $category->id }})">
                                                <a href="#{{$category->id}}" data-category-id="{{ $category->id }}" wire:click="selectCategory('{{ $category->id  }}')" onclick="closeModal()">
                                                    <p style="font-family: 'Montserrat',serif; font-style: normal; font-weight: 700; font-size: 14px; color: #2E2E2E;">{{ $category->name }}</p></a>
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


                        <div style="margin-left: 20px; position: relative;" wire:ignore>
                            <label>Місцезнаходження</label><br>
                            <div onclick="selectedRegion(this)" class="menu-item" style="height: 40px; margin-top: 15px;margin-bottom: 0;border-right: 5px solid #2E2E2E;">
                                <p id="selected-region-text" style="color: {{ $selectedRegion ? '#2E2E2E' : '#A1A1A1' }};">
                                    @if ($selectedRegion)
                                        {{ $selectedRegion }}
                                    @else
                                        Оберіть область
                                    @endif
                                </p>
                                <img style="margin-right: 15px" src="{{ asset('assets/images/seting_menu_btn.png') }}" alt="">
                            </div>

                            <div class="cont_region" id="cont_region">
                                @foreach ($regions as $region)
                                    <div style="margin-top: 15px" onclick="selectRegion('{{ $region }}')" wire:click="selectRegion('{{ $region }}')">
                                        <a>{{ $region }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    @error('selectedRegion') <span class="text-danger">{{ $message }}</span> @enderror

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
                            <div style="display: flex; flex-wrap: wrap; gap: 20px">
                                @foreach(range(0, 7) as $i)
                                    <div class="img_box" style="background-color: #EFEFEF;" wire:key="img_box_{{ $i }}">
                                        @if(isset($img[$i]))
                                            <!-- Якщо зображення завантажене через Livewire -->
                                            @if(is_object($img[$i]))
                                                <div style="position: relative;">
                                                    <img class="file_img" src="{{ $img[$i]->temporaryUrl() }}" alt="Фото {{ $i+1 }}">
                                                    <!-- Кнопка видалення -->
                                                    <button type="button" wire:click="deleteImage({{ $i }})"
                                                            style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; padding: 0;">
                                                        X
                                                    </button>
                                                </div>
                                            @else
                                                <!-- Якщо це рядок (існуючий шлях до зображення в базі даних) -->
                                                <div style="position: relative;">
                                                    <img class="file_img" src="{{ asset('storage/' . $img[$i]) }}" alt="Фото {{ $i+1 }}">
                                                    <!-- Кнопка видалення -->
                                                    <button type="button" wire:click="deleteImage({{ $i }})"
                                                            style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; padding: 0;">
                                                        X
                                                    </button>
                                                </div>
                                            @endif
                                        @elseif($i == count($img))
                                            <!-- Якщо це наступний квадрат після останнього завантаженого фото, показуємо кнопку для завантаження -->
                                            <input type="file" wire:model="img.{{ $i }}" id="fileInput{{ $i }}" style="display: none;">
                                            <label for="fileInput{{ $i }}" class="file-upload-button">
                                                <p>Додати фото</p>
                                            </label>
                                        @else
                                            <!-- Якщо зображення не завантажене, показуємо іконку камери -->
                                            <img src="{{ asset('assets/images/кам.png') }}" alt="Значок камери">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div class="price_create">
                                <label>Ціна</label><br>
                                <input type="number" wire:model="regular_price" required><br>

                                <div style="margin-top: 35px" wire:ignore>
                                    <label>Вкажіть стан товару</label><br>
                                    <div onclick="selectedRegion(this)" class="menu-item" style="height: 40px; margin-top: 15px;margin-bottom: 0;border-right: 5px solid #2E2E2E;">
                                        <p id="selected-stane-text" style="font-size:20px; color: {{ $selectedStane ? '#2E2E2E' : '#A1A1A1' }};">
                                            @if ($selectedStane)
                                                {{ $selectedStane }}
                                            @else
                                                стан
                                            @endif
                                        </p>
                                        <img style="margin-right: 15px" src="{{ asset('assets/images/seting_menu_btn.png') }}" alt="">
                                    </div>

                                    <div class="cont_region" id="cont_region2" style="height: 90px">
                                        @foreach ($stanes as $stane)
                                            <div style="margin-top: 15px" onclick="selectStane('{{ $stane }}')" wire:click="selectStane('{{ $stane }}')">
                                                <a>{{ $stane }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>




                                <div class="vip_create">
                                    @if(Auth::user()->utype === 'VIP')
                                        <input type="checkbox" wire:model="type">
                                        <label class="vip_create_item">Помітити як “VIP”</label><br>
                                    @else
                                        <input type="checkbox" disabled>
                                        <label class="vip_create_item">Помітити як “VIP”</label><br>
                                        <label class="QuickPlus_create_item">Тільки з підпискою QuickPlus</label>
                                    @endif

                                </div>
                            </div>

                            <div class="info_create">
                                <label>Контактні данні</label><br>
                                <input wire:model="phone_number" type="number" placeholder="Номер телефону"><br>
                                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror

                                <div style="margin-top:35px">
                                    <label>Посилання на відеоогляд (якщо є)</label><br>
                                    <input type="text" wire:model="video" id="youtube_review_link" class="form-control" placeholder="youtube посилання">
                                    @error('video') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="button_create">
                            <p>Оновити</p>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>
        .menu-item p{
            /* стан */
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 100%;
            color: #A1A1A1;
        }
    </style>

    <script>
        function selectedRegion(element) {
            const content = element.nextElementSibling;

            const icon = element.querySelector('img');

            if (content.style.display === "block") {
                content.style.display = "none";
                element.style.borderRadius = "5px 5px 5px 5px";


                if (icon) {
                    icon.src = "/assets/images/seting_menu_btn.png";
                }

            } else {
                content.style.display = "block";
                element.style.borderRadius = "5px 5px 0 0";
                content.style.borderRadius = "0 0 5px 5px";


                if (icon) {
                    icon.src = "/assets/images/btn_v_setting.png";
                }
            }
        }

        function selectRegion(region) {
            // Зміна тексту вибраної області
            document.getElementById('selected-region-text').textContent = region;
            document.getElementById('selected-region-text').style.color = "#2E2E2E";
            var content = document.getElementById("cont_region");

            content.style.display = "none";
        }

        function selectStane(stane) {
            // Зміна тексту вибраної області
            document.getElementById('selected-stane-text').textContent = stane;
            document.getElementById('selected-stane-text').style.color = "#2E2E2E";

            const content2 = document.getElementById("cont_region2"); // Ваш ID для меню
            content2.style.display = "none";
        }

    </script>
</div>

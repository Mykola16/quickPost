<div>
    <div class="content">
        <div class="search">
            <input id="searchInput" name="search" type="search"  wire:model="search" placeholder="Що шукаєте?" autocomplete="off">
            <label for="input">
                <img id="micClick" class="micIcon" src="{{ asset('assets/images/mic_icon.png')}}" alt="mic_icon">
            </label>
        </div>

{{--    value="{{$_GET['search']}}"--}}

        <div>
            <div class="search_map" onclick="selectedRegion(this)" id="map_btn">
                <p id="selected-region-text" style="cursor: pointer; color: {{ $selectedRegion === 'Вся Україна' ? '#A1A1A1' : '#2E2E2E' }};">
                    @if($selectedRegion)
                        {{ $selectedRegion }}
                    @else
                        <p>Вся Україна</p>
                    @endif
                </p>

{{--                Вся Україна--}}

                <label>
                    <img src="{{ asset('assets/images/map.png')}}" alt="search__icon">
                </label>
            </div>

                <div class="cont_region2" id="cont_region2">
                    <div class="block_scroll">
                        @foreach ($regions as $region)
                            <div style="margin-top: 15px;" onclick="selectRegion('{{ $region }}')">
                                <a style="cursor: pointer;">{{ $region }}</a>
                            </div>
                        @endforeach
                    </div>

                </div>
        </div>



        <div class="btn">
            <button wire:click="searchProducts" class="button_search" type="submit">
                <p>Пошук</p>
                <img src="{{ asset('assets/images/search_icon.png')}}" alt="search_icon">
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const urlParams = new URLSearchParams(window.location.search);
                const searchParam = urlParams.get('search');


                if (searchParam) {
                    let searchInput = document.getElementById('searchInput');
                    if (searchInput) {
                        searchInput.value = searchParam;
                        searchInput.dispatchEvent(new Event('input'));
                    }
                }
            }, 100);
        });


        function selectedRegion(element) {
        const content = element.nextElementSibling;

        const icon = element.querySelector('img');

            if (content.style.display === "block") {
                content.style.display = "none";
                element.style.borderRadius = "15px 15px 15px 15px";
                element.style.borderWidth = "3px";
            } else {
                content.style.display = "block";
                element.style.borderRadius = "15px 15px 0 0";
                element.style.borderWidth = "0 3px 0 3px";
                content.style.borderRadius = "0 0 15px 15px";
            }
        }



        function selectRegion(region) {
            // Зміна тексту вибраної області
            // document.getElementById('selected-region-text').textContent = region;
            // document.getElementById('selected-region-text').style.color = "#2E2E2E";
            var content2 = document.getElementById("cont_region2");
            var map_btn = document.getElementById("map_btn");


            content2.style.display = "none";
            map_btn.style.borderRadius = "15px 15px 15px 15px";
            map_btn.style.borderWidth = "3px";

        @this.set('selectedRegion', region);
        }

    </script>

</div>


{{--        <div style="margin-left: 20px; position: relative;" wire:ignore>--}}
{{--            <label>Місцезнаходження</label><br>--}}
{{--            <div onclick="selectedRegion(this)" class="menu-item" style="height: 40px; margin-top: 15px;margin-bottom: 0;border-right: 5px solid #2E2E2E;">--}}
{{--                <p id="selected-region-text">Оберіть область</p>--}}
{{--                <img style="margin-right: 15px" src="{{ asset('assets/images/seting_menu_btn.png') }}" alt="">--}}
{{--            </div>--}}

{{--            <div class="cont_region" id="cont_region">--}}
{{--                @foreach ($regions as $region)--}}
{{--                    <div style="margin-top: 15px" onclick="selectRegion('{{ $region }}')" wire:click="selectRegion('{{ $region }}')">--}}
{{--                        <a>{{ $region }}</a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

<div>
    <div class="content">
        <div class="search">
            <input id="searchInput" name="search" type="search"  wire:model="search" placeholder="Що шукаєте?" autocomplete="off">
            <label for="input">
                <img id="micClick" class="micIcon" src="{{ asset('assets/images/mic_icon.png')}}" alt="mic_icon">
            </label>
        </div>

{{--    value="{{$_GET['search']}}"    --}}

        <div class="search_map">
            <input type="text" name="text" class="input" id="input" placeholder="Вся Україна" autocomplete="off" autocorrect="off">
            <label for="input">
                <img src="{{ asset('assets/images/map.png')}}" alt="search__icon">
            </label>
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


    </script>

</div>



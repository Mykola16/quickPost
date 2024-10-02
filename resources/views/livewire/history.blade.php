@section('title')
    Історія замовлень
@endsection

<div class="history_page">
    <h1 class="profile_page_name" >Історія замовлень</h1>

    <div class="search_user_icon2">
        <input type="search" placeholder="Знайти замовлення">
        <button>Пошук</button>
        <img src="{{ asset('assets/images/search_black.png')}}" alt="search_icon">
    </div>

    <div style="margin-top: 35px;overflow-x: hidden; overflow-y: auto; width: 1000px;  height: 875px">

            @foreach($orders as $item)

                @php
                    $image = '';
                    if(count($item->product->images) > 0)
                    {
                        $image = $item->product->images[0]['img'];
                    }
                    else{
                        $image = 'no_image.png';
                    }

                @endphp

                <div class="product_zamovlennya">
                    <img src="{{Storage::url($image)}}" alt="">
                    <h3>{{$item->product->name}}</h3>
                    <a style="left: 140px;">{{ $item->Method_of_payment }}</a>
                    <p>{{ $item->status }}</p>
                    <a style="right: 26px;">{{$item->created_at->format('d.m.y')}}</a>
                </div>
            @endforeach

    </div>
</div>



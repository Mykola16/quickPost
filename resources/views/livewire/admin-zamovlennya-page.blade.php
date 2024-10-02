@section('title')
    Замовлення
@endsection

<div>
    <h1>Замовлення</h1>

    <div style="margin-top: 35px;overflow-x: hidden; overflow-y: auto; width: 1000px;  height: 875px">

        @foreach($orders as $item)
            @php
                $image = 'no_image.png';


                if ($item->product) {
                    if ($item->product->images && $item->product->images->count() > 0) {
                        $image = $item->product->images[0]->img;
                    }
                    $productName = $item->product->name;
                }
            @endphp

            <div class="product_zamovlennya">
                <img src="{{Storage::url($image)}}" alt="">
{{--                <img src="{{ asset('laravel/storage/app/public/' . $image) }}" alt="">--}}
                <h3>{{ $productName }}</h3>
                <a style="left: 140px;">{{ $item->Method_of_payment }}</a>
                <h4>№ {{ $item->tracking_no }}</h4>
                <p>{{ $item->status }}</p>
                <a style="right: 26px;">{{ $item->created_at->format('d.m.y') }}</a>
            </div>
        @endforeach

    </div>
</div>

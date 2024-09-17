@section('title')
    Замовлення
@endsection

<div>
    <h1>Замовлення</h1>

    <div style="margin-top: 35px">

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
                <h4>№ {{ $item->tracking_no}}</h4>
                <p>{{ $item->status }}</p>
                <a style="right: 26px;">{{$item->created_at->format('d.m.y')}}</a>
            </div>
        @endforeach

    </div>
</div>

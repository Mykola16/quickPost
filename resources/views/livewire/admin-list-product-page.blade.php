@section('title')
    Оголошення
@endsection

<div class="prod_list_adm">
    <h1>Оголошення</h1>

    <div style="margin-top: 32px">

    </div>
    <div style="width: 100%; max-height: 853px; overflow-y: auto">
    @foreach ($allProducts as $product)

        @php
            $image = '';
            if(count($product->images) > 0)
            {
                $image = $product->images[0]['img'];
            }
            else{
                $image = 'no_image.png';
            }

        @endphp


        <div class="admin_product_all_list">

            <div style="width: 80%; height: 100%">
                <a href="{{ route('product.show', $product->id) }}">
                    <img class="prod_img" src="{{Storage::url($image)}}" alt="">
                </a>

                <div class="prod_name_adm">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </div>

                <div class="desc_prod_adm">
                    <p>{{ $product->short_description }}</p>
                </div>

                @if ($product->created_at->gt(now()->subDay()))
                    <div class="NEW">
                        Нове
                    </div>
                @endif


                <div class="price_prod_adm">
                    <p>{{ $product->regular_price }} грн</p>
                </div>

                <div class="region_prod_adm">
                    <a>{{ $product->region }}</a>
                </div>

            </div>

            <div class="sms">
                <img src="{{ asset('assets/images/sms1.png') }}" alt="" wire:click="sms({{ $product->user_id }})">
            </div>

            <div class="ban">
                @if($product->type === 'blocked')
                    <img src="{{ asset('assets/images/ban red 1.png') }}" alt="" wire:click="noban({{ $product->id }})">
                @else
                    <img src="{{ asset('assets/images/ban.png') }}" alt="" wire:click="ban({{ $product->id }})">
                @endif
            </div>

            <div class="warning">
                <img src="{{ asset('assets/images/!!!.png') }}" alt="" wire:click="warning({{ $product->user_id }}, '{{ $product->name }}')">
            </div>


            <div class="count_like"> {{ \App\Models\Like::where('product_id', $product->id)->count() }}</div>

            <div class="like">
                <div class="con-like">
                    <div class="checkmark">
                        <svg xmlns="http://www.w3.org/2000/svg" class="outline" viewBox="0 0 24 24">
                            <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>


    @endforeach
    </div>

    <style>

    </style>

</div>

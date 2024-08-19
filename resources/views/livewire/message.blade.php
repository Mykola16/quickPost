@section('title')
    message
@endsection


<div wire:poll>
    @if($conversations->isNotEmpty())
    <h1 class="profile_page_name" >Повідомлення</h1>

    <div style="margin-top: 35px;">

        @foreach($conversations as $conversation)

        <div class="message_list"  style="margin-bottom: 25px" wire:click="viewMessage( {{ $conversation->id }} )">
            <div class="df">
{{--                <img src="assets/images/profile_menu_img/{{ $conversation->receiver->avatar}}" alt="123">--}}
                @if($conversation->sender_id === auth()->id())
                    <img src="{{Storage::url($conversation->receiver->avatar)}}" alt="">
                @else
                    <img src="{{Storage::url($conversation->sender->avatar)}}" alt="">
                @endif
                <a href="#">{{$conversation->messages->last()?->body}}</a>

            </div>
        </div>

        @endforeach
    </div>
    @else
        <h1 class="profile_page_name" >Повідомлення</h1>
    @endif
</div>


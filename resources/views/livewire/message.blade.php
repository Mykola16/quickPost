@section('title')
    message
@endsection


<div wire:poll>
    @if($conversations->isNotEmpty())
    <h1 class="profile_page_name" >Повідомлення</h1>

    <div style="margin-top: 35px;">

        @foreach($conversations as $conversation)

        <div class="message_list"  style="margin-bottom: 25px">
            <div class="df" style="height: 100%">
{{--                <img src="assets/images/profile_menu_img/{{ $conversation->receiver->avatar}}" alt="123">--}}
                @if($conversation->sender_id === auth()->id())
                    @if($conversation->receiver->avatar === null)
                        <img src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar" wire:click="viewMessage( {{ $conversation->id }} )">
                    @else
                        <div><img src="{{Storage::url($conversation->receiver->avatar)}}" alt="" wire:click="viewMessage( {{ $conversation->id }} )"></div>
                    @endif
                @else
                    @if($conversation->sender->avatar === null)
                        <img src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar" wire:click="viewMessage( {{ $conversation->id }} )">
                    @else
                        <div><img src="{{Storage::url($conversation->sender->avatar)}}" alt="" wire:click="viewMessage( {{ $conversation->id }} )"></div>
                    @endif
                @endif

                <div style="width: 80%; height: 100%" wire:click="viewMessage( {{ $conversation->id }} )">
                    @if($conversation->sender_id === auth()->id())
                        <a>{{ $conversation->receiver->name }}</a>
                    @else
                        <a>{{ $conversation->sender->name }}</a>
                    @endif

                    <p>{{$conversation->messages->last()?->body}}</p>
                </div>

                <div class="menu_and_data">
                    <div class="menu_message"><img wire:click="delete({{ $conversation }})" src="{{ asset('assets/images/menu_message.png') }}"></div>
                    <div class="data_messages">
                        @if($conversation->messages->last() === null)
                            <a>{{$conversation->created_at->format('d.m.y')}}</a>
                        @else
                            <a>{{$conversation->messages->last()?->created_at->format('d.m.y')}}</a>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        @endforeach
    </div>
    @else
        <h1 class="profile_page_name">Повідомлень немає</h1>
    @endif
</div>


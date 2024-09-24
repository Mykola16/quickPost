@section('title')
    Повідомлення
@endsection


<div wire:poll>
    @if($conversations->isNotEmpty())
    <h1 class="profile_page_name" >Повідомлення</h1>

        <div>
            <!-- Modal for delete confirmation -->
            @if($showModal)
                <div class="modal5" style="display: flex;">
                    <div class="modal-content5">
                        <span class="close-button5" wire:click="$set('showModal', false)">&times;</span>
                        <h2>Підтвердження видалення</h2>
                        <p>Ви дійсно хочете видалити це оголошення?</p>
                        <button wire:click="delete">Так, видалити</button>
                        <button wire:click="$set('showModal', false)">Скасувати</button>
                    </div>
                </div>
            @endif
        </div>

    <div style="margin-top: 35px;">

        @foreach($conversations as $conversation)

        <div class="message_list"  style="margin-bottom: 25px">
            <div class="df" style="height: 100%;">
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
                    <div class="menu_message"><img wire:click="openDeleteConfirmation({{ $conversation->id }})" src="{{ asset('assets/images/ban red 1.png') }}" style="width: 25px;height: 25px;"></div>
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

    <style>
        .modal5 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }
        .modal-content5 {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 500px;
            position: relative;
        }
        .close-button5 {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .modal-content5 button{
            width: 180px;
            height: 40px;

            border-radius: 15px;

            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 100%;
        }

        .modal-content5 h2{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 100%;
        }

        .modal-content5 p{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 100%;
        }
    </style>
</div>


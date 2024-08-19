<div wire:poll>
    <h1 class="profile_page_name" >Повідомлення</h1>

    <div class="chat_div">
        <div class="chat_info">
            @if($conversation->sender_id === auth()->id())
                <div><img src="{{Storage::url($conversation->receiver->avatar)}}" alt=""></div>
                <div style="margin-left:15px;"><p>{{$conversation->receiver->name}}</p></div>
            @else
                <div><img src="{{Storage::url($conversation->sender->avatar)}}" alt=""></div>
                <div style="margin-left:15px;"><p>{{$conversation->sender->name}}</p></div>
            @endif
        </div>

        <div class="chat_messages">

            <div class="chat_messages_2">

                @foreach($selectedConversation->messages as $message)
                    <div class="message-box {{ $message->user_id === auth()->id() ?  'message-sender' : 'message-receiver' }}"> {{--приймач--}}
                        <a>{{$message->body}}</a>
                    </div>
                @endforeach


{{--                    <div class="message-box message-receiver"> --}}{{--приймач--}}
{{--                        <a>{{$message->body}}</a>--}}
{{--                    </div>--}}

{{--                <div class="message-box message-sender">  --}}{{--відправник--}}
{{--                    <a>ні, допобачення</a>--}}
{{--                </div>--}}

            </div>

        </div>

        <form wire:submit.prevent="sendMessage" action="#">
            <div class=" df">

                <img class="icons" src="{{ asset('assets/images/load_file.png') }}" alt="">
                <img  class="icons" src="{{ asset('assets/images/smile.png') }}" alt="">


                    <div class="input_container">
                        <input wire:model.defer="body" type="text">
                    </div>
                    <input class="btn_message" type="submit">

            </div>

        </form>
    </div>
</div>

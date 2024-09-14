<div wire:poll>
    <h1 class="profile_page_name" >Повідомлення</h1>

    <div class="chat_div">
        <div class="chat_info">
            @if($conversation->sender_id === auth()->id())
                @if($conversation->receiver->avatar === null)
                    <img src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar">
                @else
                    <div><img src="{{Storage::url($conversation->receiver->avatar)}}" alt=""></div>
                @endif
                    <div style="margin-left:15px;"><p>{{$conversation->receiver->name}}</p></div>
            @else
                @if($conversation->sender->avatar === null)
                    <img src="{{asset('assets/images/no_avatar/no_avatar.png')}}" alt="avatar">
                @else
                    <div><img src="{{Storage::url($conversation->sender->avatar)}}" alt=""></div>
                @endif
                    <div style="margin-left:15px;"><p>{{$conversation->sender->name}}</p></div>

            @endif

            <div class="menu_chat">
                <img src="{{ asset('assets/images/menu_chat.png') }}">
            </div>
        </div>

        <div class="chat_messages">

            <div class="chat_messages_2">

                @foreach($selectedConversation->messages as $message)
                    <div class="message-box {{ $message->user_id === auth()->id() ?  'message-sender' : 'message-receiver' }}"> {{--приймач--}}
                        <a>{{$message->body}}</a>
                        <p>{{$message->created_at->format('H:i')}}</p>
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

        <form wire:submit.prevent="sendMessage">

            <div class=" df">

                <img class="icons" src="{{ asset('assets/images/load_file.png') }}" alt="">
                <img  class="icons" src="{{ asset('assets/images/smile.png') }}" alt="" id="emojiButton">


                    <div class="input_container">
                        <input id="messageInput" wire:model.defer="body" type="text" maxlength="102">
                        <img id="micClick2" class="micIcon2" src="{{ asset('assets/images/mic_icon.png')}}" alt="mic_icon">
                        <button class="btn_message" type="submit"><img src="{{ asset('assets/images/chat_send.png') }}"></button>
                    </div>


            </div>

            <div id="emojiPanel" class="emoji-container" style="display: none;" wire:ignore>
                <button type="button" class="emoji-btn">👋</button>
                <button type="button" class="emoji-btn">👍</button>
                <button type="button" class="emoji-btn">👎</button>
                <button type="button" class="emoji-btn">👏</button>
                <button type="button" class="emoji-btn">🙏</button>
                <button type="button" class="emoji-btn">🙌</button>
                <button type="button" class="emoji-btn">💪</button>
                <button type="button" class="emoji-btn">😀</button>
                <button type="button" class="emoji-btn">😂</button>
                <button type="button" class="emoji-btn">🤣</button>
                <button type="button" class="emoji-btn">😊</button>
                <button type="button" class="emoji-btn">😍</button>
                <button type="button" class="emoji-btn">❤️</button>
                <button type="button" class="emoji-btn">😘</button>
                <button type="button" class="emoji-btn">😎</button>
                <button type="button" class="emoji-btn">😢</button>
                <button type="button" class="emoji-btn">😡</button>
                <button type="button" class="emoji-btn">😱</button>
                <button type="button" class="emoji-btn">🌟</button>
                <button type="button" class="emoji-btn">🎉</button>
                <button type="button" class="emoji-btn">🔥</button>
                <button type="button" class="emoji-btn">💥</button>
                <button type="button" class="emoji-btn">🎂</button>
                <button type="button" class="emoji-btn">🍔</button>
                <button type="button" class="emoji-btn">🍕</button>
                <button type="button" class="emoji-btn">🚀</button>
                <button type="button" class="emoji-btn">⚡</button>
                <button type="button" class="emoji-btn">✨</button>
                <button type="button" class="emoji-btn">💫</button>
                <button type="button" class="emoji-btn">🎁</button>
                <button type="button" class="emoji-btn">🕶️</button>
                <button type="button" class="emoji-btn">🎵</button>
                <button type="button" class="emoji-btn">🎤</button>
                <button type="button" class="emoji-btn">📸</button>
                <button type="button" class="emoji-btn">💬</button>
                <button type="button" class="emoji-btn">🚗</button>
                <button type="button" class="emoji-btn">✈️</button>
                <button type="button" class="emoji-btn">🏡</button>
                <button type="button" class="emoji-btn">🎈</button>
                <button type="button" class="emoji-btn">🌈</button>
                <button type="button" class="emoji-btn">🍦</button>
                <button type="button" class="emoji-btn">🍩</button>
                <button type="button" class="emoji-btn">🥂</button>
                <button type="button" class="emoji-btn">🏆</button>
                <button type="button" class="emoji-btn">🎸</button>
                <button type="button" class="emoji-btn">🖼️</button>
                <button type="button" class="emoji-btn">📚</button>
                <button type="button" class="emoji-btn">🔑</button>
                <button type="button" class="emoji-btn">💍</button>
                <button type="button" class="emoji-btn">🌺</button>
                <button type="button" class="emoji-btn">🏖️</button>
                <button type="button" class="emoji-btn">🌌</button>
                <button type="button" class="emoji-btn">🚴‍♂️</button>
                <button type="button" class="emoji-btn">💼</button>
                <button type="button" class="emoji-btn">📦</button>
                <button type="button" class="emoji-btn">🔧</button>
                <button type="button" class="emoji-btn">🌎</button>
                <button type="button" class="emoji-btn">🏅</button>
                <button type="button" class="emoji-btn">💖</button>
                <button type="button" class="emoji-btn">💔</button>
                <button type="button" class="emoji-btn">🧡</button>
                <button type="button" class="emoji-btn">💛</button>
                <button type="button" class="emoji-btn">💚</button>
                <button type="button" class="emoji-btn">💙</button>
                <button type="button" class="emoji-btn">💜</button>
                <button type="button" class="emoji-btn">🖤</button>
                <button type="button" class="emoji-btn">🤍</button>
                <button type="button" class="emoji-btn">🤎</button>
                <button type="button" class="emoji-btn">🏆</button>
                <button type="button" class="emoji-btn">🔝</button>
                <button type="button" class="emoji-btn">🔙</button>
                <button type="button" class="emoji-btn">🔜</button>
                <button type="button" class="emoji-btn">🔚</button>
                <button type="button" class="emoji-btn">🔘</button>
                <button type="button" class="emoji-btn">🛑</button>
                <button type="button" class="emoji-btn">🚧</button>
                <button type="button" class="emoji-btn">🔔</button>
                <button type="button" class="emoji-btn">🔕</button>
                <button type="button" class="emoji-btn">🚦</button>
                <button type="button" class="emoji-btn">🔋</button>
                <button type="button" class="emoji-btn">🎯</button>
                <button type="button" class="emoji-btn">💡</button>
                <button type="button" class="emoji-btn">🔍</button>
                <button type="button" class="emoji-btn">🗨️</button>
                <button type="button" class="emoji-btn">✉️</button>
                <button type="button" class="emoji-btn">📥</button>
                <button type="button" class="emoji-btn">📤</button>
                <button type="button" class="emoji-btn">📬</button>
                <button type="button" class="emoji-btn">📧</button>
            </div>
        </form>
    </div>

   <script>
       document.addEventListener('DOMContentLoaded', () => {
           const emojiButton = document.getElementById('emojiButton');
           const emojiPanel = document.getElementById('emojiPanel');


           emojiButton.addEventListener('click', (event) => {
               event.stopPropagation();
               if (emojiPanel.style.display === 'none' || emojiPanel.style.display === '') {
                   emojiPanel.style.display = 'block';
               } else {
                   emojiPanel.style.display = 'none';
               }
           });


           document.addEventListener('click', (event) => {
               if (!emojiPanel.contains(event.target) && event.target !== emojiButton) {
                   emojiPanel.style.display = 'none';
               }
           });


           document.querySelectorAll('.emoji-btn').forEach(button => {
               button.addEventListener('click', (event) => {
                   event.stopPropagation(); // Предотвращаем закрытие панели при клике на эмодзи
                   const emoji = button.textContent;
                   const input = document.getElementById('messageInput');
                   input.value += emoji;
                   input.dispatchEvent(new Event('input'));
               });
           });
       });
   </script>
</div>

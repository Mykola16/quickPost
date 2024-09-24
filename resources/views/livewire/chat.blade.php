@section('title')
    Повідомлення
@endsection

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

                        @if($message->photo_path)
                            <img src="{{ Storage::url($message->photo_path) }}" alt="Uploaded Photo" style="max-width: 300px;margin-bottom: 20px"><br>
                        @endif

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

                <label for="photo" class="icons">
                    <img src="{{ asset('assets/images/load_file.png') }}" alt="load_file">
                </label>
                <img  class="icons" src="{{ asset('assets/images/smile.png') }}" alt="" id="emojiButton">

                <input type="file" id="photo" wire:model="photo" style="display: none;" accept="image/*">

                    <div class="input_container">
                        <input id="messageInput" wire:model.defer="body" type="text" maxlength="102">
                        <img id="micClick2" class="micIcon2" src="{{ asset('assets/images/mic_icon.png')}}" alt="mic_icon">
                        <button class="btn_message" type="submit"><img src="{{ asset('assets/images/chat_send.png') }}"></button>
                    </div>


            </div>

            <div id="emojiPanel" class="emoji-container" style="display: none;" wire:ignore>
                <div class="emoji_scroll">
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
            </div>
        </form>
    </div>

   <script>
       window.onload = function() {
           var lastMessage = document.querySelector('.chat_messages_2 .message-box:last-child');
           if (lastMessage) {
               lastMessage.scrollIntoView({ behavior: "instant" });
           }
       };

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

       micClick2.addEventListener('click', function () {
           var speech = true;
           window.SpeechRecognition = window.webkitSpeechRecognition;
           const recognition = new SpeechRecognition();
           recognition.interimResults = true;

           recognition.addEventListener('result', e => {
               const transcript = Array.from(e.results)
                   .map(result => result[0])
                   .map(result => result.transcript)
                   .join('');

               // Вставляем распознанный текст в поле ввода сообщения
               const messageInput = document.getElementById('messageInput');
               messageInput.value = transcript;

               // Создаем событие input для синхронизации с Livewire
               messageInput.dispatchEvent(new Event('input'));
           });

           if (speech === true) {
               recognition.start();
           }
       });
   </script>
</div>

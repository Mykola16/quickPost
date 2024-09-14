<?php

namespace App\Livewire;

use App\Models\Conversation;
use Livewire\Component;
use App\Models\Message;

class Chat extends Component
{
    public $body;
    public $selectedConversation;

    public $conversationID;

    public function mount($conversationID)
    {
        $this->selectedConversation = Conversation::findOrFail($conversationID);

//        $this->selectedConversation = Conversation::query()
//            ->where('sender_id',auth()->id())
//            ->orWhere('receiver_id',auth()->id())
//            ->first();

        $this->loadConversation();
    }

    public function loadConversation()
    {
        $conversation = Conversation::find($this->conversationID);

        if (!$conversation) {
            abort(404);
        }
    }

    public function sendMessage()
    {
        if (empty(trim($this->body))) {
            return;
        }

       Message::create([
           'conversation_id' => $this->selectedConversation->id,
           'user_id' => auth()->id(),
           'body' => $this->body,
       ]);

       $this->reset('body');

//       $this->viewMessage($this->selectedConversation->id);
    }

    public function render()
    {
        return view('livewire.chat' , ['conversation' => $this->selectedConversation])
            ->layout("layouts.profile");
    }
}

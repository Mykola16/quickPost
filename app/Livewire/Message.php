<?php

namespace App\Livewire;

use App\Models\Conversation;
use Livewire\Component;

class Message extends Component
{

    public $selectedConversation;

    public function viewMessage($conversationID)
    {
        return redirect()->route('chat.view', ['conversationID' => $conversationID]);
    }


    public function delete(Conversation $conversations){
        $conversations->delete();
    }

    public function render()
    {


        $conversations = Conversation::query()
            ->where('sender_id',auth()->id())
            ->orWhere('receiver_id',auth()->id())
            ->get();


        return view('livewire.message',
            ['conversations' => $conversations])
            ->layout("layouts.profile");
    }
}

<?php

namespace App\Livewire;

use App\Models\Conversation;
use Livewire\Component;
use App\Models\Message;
use Livewire\WithFileUploads;

class Chat extends Component
{
    use WithFileUploads;

    public $body;

    public $photo;
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
        $this->validate([
            'body' => 'required|string|max:102',
        ]);


        $message = Message::create([
           'conversation_id' => $this->selectedConversation->id,
           'user_id' => auth()->id(),
           'body' => $this->body,
       ]);

        if ($this->photo) {
            $this->validate([
                'photo' => 'image|max:1024',
            ]);

            $path = $this->photo->store('photos', 'public');
            $message->update([
                'photo_path' => $path,
            ]);

            $this->reset('photo');
        }

       $this->reset('body');

//       $this->viewMessage($this->selectedConversation->id);
    }


    public function render()
    {
        return view('livewire.chat' , ['conversation' => $this->selectedConversation])
            ->layout("layouts.profile");
    }
}

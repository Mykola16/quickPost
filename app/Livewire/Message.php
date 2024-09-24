<?php

namespace App\Livewire;

use App\Models\Conversation;
use Livewire\Component;

class Message extends Component
{

    public $selectedConversation;

    public $showModal = false;
    public function openDeleteConfirmation($id)
    {
        $this->selectedConversation = $id;
        $this->showModal = true;
    }

    public function delete()
    {
        if ($this->selectedConversation) {
            $conversations = Conversation::find($this->selectedConversation);
            if ($conversations) {
                $conversations->delete();
//                $this->dispatch('userDashUpdated');
                $this->showModal = false;
                $this->render();
//                session()->flash('message', 'Оголошення видалено');
            }
        }
    }

    public function viewMessage($conversationID)
    {
        return redirect()->route('chat.view', ['conversationID' => $conversationID]);
    }


//    public function delete(Conversation $conversations){
//        $conversations->delete();
//    }

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

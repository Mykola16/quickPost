<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\Product;

use Livewire\Component;

class AdminListProductPage extends Component
{

    public function sms($user_id){
        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $user_id,
        ]);

        $conversationID = $conversation->id;

        return redirect()->route('chat.view', ['conversationID' => $conversationID]);
    }

    public function warning($user_id, $product_name){
        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $user_id,
        ]);

        $conversationID = $conversation->id;

        $messageBody = "Ваше оголошення \"{$product_name}\" містить недостовірну інформацію. Будь ласка, виправте його.";

        $existingMessage = \App\Models\Message::where('conversation_id', $conversationID)
            ->where('user_id', auth()->id())
            ->where('body', $messageBody)
            ->where('created_at', '>=', now()->subDay())
            ->first();

        if (!$existingMessage) {
            \App\Models\Message::create([
                'conversation_id' => $conversationID,
                'user_id' => auth()->id(),
                'body' => $messageBody,
            ]);
        }
    }

    public function ban($product_id) {
        $product = Product::find($product_id);

        if ($product) {
            $product->type = 'blocked';
            $product->save();
        }
    }

    public function noban($product_id) {
        $product = Product::find($product_id);

        if ($product) {
            $product->type = null;
            $product->save();
        }
    }

    public function render()
    {
        $allProducts = Product::orderBy('created_at', 'desc')->get();
        return view('livewire.admin-list-product-page', compact('allProducts'))->layout("layouts.adminDashbord");
    }
}

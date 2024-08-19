<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\ShoppingCart;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;



class ProductShow extends Component
{
    use WithPagination;

    public $product;
    public $allProducts;



    public function mount($id)
    {
        $this->product = Product::find($id);

        $this->allProducts = Product::where('id', '!=', $this->product->id)
            ->get();
    }


    public function addToCart($id){
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ];

        ShoppingCart::updateOrCreate($data);


    }

    public function startConversation($user_id){

        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $user_id,
        ]);

        $conversationID = $conversation->id;

        return redirect()->route('chat.view', ['conversationID' => $conversationID]);

    }

    public function render()
    {
//        $products = Product::all();


        return view('livewire.product-show',['allProducts' => $this->allProducts])->layout("layouts.base");
    }
}


//, ['products' => $products]

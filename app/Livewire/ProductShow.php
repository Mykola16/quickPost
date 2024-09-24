<?php

namespace App\Livewire;

use App\Models\Conversation;
use App\Models\ShoppingCart;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use function Termwind\style;


class ProductShow extends Component
{
    use WithPagination;

    public $product;
    public $allProducts;
    public $message = null;

    public function mount($id)
    {
        $this->product = Product::find($id);

        $this->allProducts = Product::where('id', '!=', $this->product->id)
            ->get();

        if ($this->product->type === 'blocked') {
            throw new \App\Exceptions\BlockedProductException;
        }
    }


    public function addToCart($id){
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ];

        ShoppingCart::updateOrCreate($data);

//        session()->flash('message', 'Товар добавлен в корзину!');

        $this->dispatch('cartUpdated');
        $this->dispatch('itemAdded', 'Товар добавлен в корзину!');
        $this->dispatch('headerUpdated');


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

<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;
use App\Models\Product;

class CartComponent extends Component
{
    public $product;
    public $cartitems;
    public $total = 0;


    public function render()
    {
        if (auth()->check()) {
            $this->cartitems=ShoppingCart::with('product.images')
                ->where(['user_id'=>auth()->user()->id])
                ->get();
            $this->total = 0;
        } else {
            $this->cartitems = collect();
        }


        foreach ($this->cartitems as $item){
            $this->total += $item->product->regular_price;
        }

        return view('livewire.cart-component', [
            'cartitems' => $this->cartitems,
        ]);
    }
}

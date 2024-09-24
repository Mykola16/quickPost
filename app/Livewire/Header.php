<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;

class Header extends Component
{
    public $cartitems;



    protected $listeners = ['headerUpdated' => 'render'];

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


        return view('livewire.header' , [
            'cartitems' => $this->cartitems
        ]);
    }
}

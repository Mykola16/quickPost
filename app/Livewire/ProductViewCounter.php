<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductViewCounter extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->product->increment('current_views');
    }

    public function decrementViews()
    {
        $this->product->decrement('current_views');
    }

    public function render()
    {
        return view('livewire.product-view-counter');



    }

}

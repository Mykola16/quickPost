<?php

namespace App\Livewire;

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



    public function render()
    {
//        $products = Product::all();
        return view('livewire.product-show',['allProducts' => $this->allProducts])->layout("layouts.base");
    }
}


//, ['products' => $products]

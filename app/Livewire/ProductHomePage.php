<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use Livewire\Component;

class ProductHomePage extends Component
{
    public $products;
    public $product;
    public $allProducts;

    public function mount(Category $category)
    {
        $this->allProducts = Product::all();

    }

    public function addToCart($id){
        $data = [
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ];

        ShoppingCart::updateOrCreate($data);

        $this->dispatch('cartUpdated');
        $this->dispatch('headerUpdated');
    }

    public function render()
    {
        // Отримання товарів, які переглядають
        $productsBeingViewed = Product::where('current_views', '>', 0)
            ->orderBy('current_views')
            ->take(8)
            ->get();

        $productsVip = Product::where('type', '=', 'VIP')
            ->orderBy('created_at')
            ->take(8)
            ->get();

        $productsBisns = Product::where('type', '=', 'BSN')
            ->orderBy('created_at')
            ->take(8)
            ->get();

        return view('livewire.product-home-page',
            compact( 'productsBeingViewed' , 'productsVip', 'productsBisns')
            ,['allProducts' => $this->allProducts]);
    }
}

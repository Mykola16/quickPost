<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;
use App\Models\Category;

class CategoryShow extends Component
{
    public $category;
    public $products;

    public $allProducts;

    public $view = 'list';

    public function mount(Category $category)
    {

        $this->category = $category;
        $this->products = $category->products;
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
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.category-show', compact('categories'))->layout('layouts.base');
    }
}

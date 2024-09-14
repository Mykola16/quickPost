<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class HomeComponent extends Component
{
    public $category;
    public $products;

    public $product;




    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = $category->products;

    }


    public function render()
    {
        // Отримання категорій
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();


        return view('livewire.home-component',
            compact('categories'))->layout("layouts.base");
    }



}

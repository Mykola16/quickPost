<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryShow extends Component
{
    public $category;
    public $subCategories;
    public $products;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->subCategories = $category->subCategories()->with('subCategories')->get();
        $this->products = $category->products;
    }

    public function render()
    {
        return view('livewire.category-show',  [
            'category' => $this->category,
            'subCategories' => $this->subCategories,
            'products' => $this->products
        ])->layout('layouts.base');
    }
}

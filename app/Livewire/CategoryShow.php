<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryShow extends Component
{
    public $category;
    public $products;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = $category->products;
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.category-show', compact('categories'))->layout('layouts.base');
    }
}

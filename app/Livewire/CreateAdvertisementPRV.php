<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CreateAdvertisementPRV extends Component
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

        return view('livewire.create-advertisement-p-r-v', compact('categories'))->layout("layouts.base");
    }
}

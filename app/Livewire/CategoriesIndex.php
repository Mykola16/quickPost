<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesIndex extends Component
{
    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.categories-index', compact('categories'))
            ->layout('layouts.base');
    }
}

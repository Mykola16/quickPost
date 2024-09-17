<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryPage extends Component
{

    public $category;
    public $name;
    public $slug;
    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function saveCategory()
    {

        Category::create([
            'name' => $this->name,
            'slug' => '',
        ]);

        // Очистка полей после успешного добавления
        $this->reset(['name']);

        $this->render();
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.admin-category-page',  compact('categories'))->layout("layouts.adminDashbord");
    }
}

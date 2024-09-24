<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryPage extends Component
{

    public $category;
    public $name;
    public $selectedCategoryId;
    public $slug;
    public $showModal = false;
    public $showModal2 = false;

    public $subCategories = [];

    public $openCategoryId = null;

    public $subCategoryName = null;

    public $searchTerm = '';

    public function getFilteredCategories()
    {
        return Category::where('name', 'like', '%' . $this->searchTerm . '%')->get();
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function openCreateModal()
    {
        $this->subCategories = null;
        $this->openCategoryId = null;
        $this->resetForm();

        $this->showModal2 = true;
    }

    public function saveCategory()
    {

        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => '',
        ]);

        $this->resetForm();
        $this->showModal2 = false;
        $this->render();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->selectedCategoryId = null;
    }

    public function openDeleteConfirmation($id)
    {
        $this->selectedCategoryId = $id;
        $this->showModal = true;
    }

    public function deleteCategory()
    {
        if ($this->selectedCategoryId) {
            $category = Category::find($this->selectedCategoryId);
            if ($category) {
                $category->delete();
                $this->render();
                $this->showModal = false;
            }
        }
    }

    public function subCat($CategoryId)
    {
        $this->selectedCategoryId = $CategoryId;

        if ($this->openCategoryId === $CategoryId) {
            $this->openCategoryId = null; // Close it
        } else {
            $this->openCategoryId = $CategoryId; // Open it
        }

        $category = Category::find($CategoryId);

        $this->subCategories = $category->subCategories;
    }



    public function editCategory($CategoryId)
    {
        $this->openCategoryId = null;

        $this->selectedCategoryId = $CategoryId;


        $category = Category::find($CategoryId);

        $this->name = $category->name;

        $this->subCategories = $category->subCategories;

        $this->showModal2 = true;
    }

    public function updateCategory()
    {
        $category = Category::find($this->selectedCategoryId);

        if ($category) {
            $category->update([
                'name' => $this->name,
            ]);

            $this->showModal2 = false;
        } else {
            session()->flash('error');
        }
    }

    public function addSubCategory()
    {
        $this->validate([
            'subCategoryName' => 'required|string|max:255',
            'selectedCategoryId' => 'required|exists:categories,id',
        ]);

        $parentCategory = Category::find($this->selectedCategoryId);
        if ($parentCategory) {
            $parentCategory->subCategories()->create([
                'name' => $this->subCategoryName,
                'slug' => '', // Генеруємо slug або залишаємо пустим
            ]);

            $this->subCategoryName = ''; // Очищуємо поле підкатегорії після додавання
            $this->subCategories = $parentCategory->subCategories; // Оновлюємо список підкатегорій
        }
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.admin-category-page',  compact('categories'))->layout("layouts.adminDashbord");
    }
}

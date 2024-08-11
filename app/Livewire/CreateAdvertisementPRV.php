<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;

use Livewire\WithFileUploads;

class CreateAdvertisementPRV extends Component
{
    use WithFileUploads;

    public $category;
    public $products;

    public $name;
    public $short_description;
    public $description;
    public $regular_price;
    public $category_id;

    public $img = [];
    public $product_id;

    public $selectedCategoryName;

    public $user_id;



    public function mount(Category $category)
    {
        $this->category = $category;
        $this->products = $category->products;

        $this->user_id = auth()->id();
    }




    public function selectCategory($categoryId)
    {
        $this->category_id = $categoryId;

        $category = Category::find($categoryId);
        $this->selectedCategoryName = $category->name;
    }

    public function render()
    {
        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.create-advertisement-p-r-v', compact('categories'))->layout("layouts.base");
    }

    public function savedata()
    {

        // Создание товара
        $product = new Product;
        $product->name = $this->name;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->category_id = $this->category_id;
        $product->user_id = auth()->id();

        $product->save();

        // Получаем ID созданного продукта
        $this->product_id = $product->id;

        // Проверка наличия изображений перед сохранением
        if (!empty($this->img)) {
            foreach ($this->img as $photo) {
                $imagename = $photo->store('photos', 'public');
                $productImage = new ProductImage;
                $productImage->img = $imagename;
                $productImage->product_id = $this->product_id;
                $productImage->save();
            }
        }

        $this->resetdata();
        return redirect()->route('user.dashboard')->with('success', 'Товар успішно створений!');
    }

    public function resetdata()
    {

        $this->reset(['name', 'short_description', 'description', 'regular_price', 'category_id']);
        $this->reset(['img', 'product_id', 'selectedCategoryName']);
    }
}

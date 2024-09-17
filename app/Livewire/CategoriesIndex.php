<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesIndex extends Component
{
    public $category;
    public $products;

    public $view = 'list';

    public $search = '';


    protected $listeners = ['searchProducts' => 'searchProducts'];

    public function mount(Category $category, Request $request)
    {
        $this->search = $request->query('search', '');

        $this->category = $category;
        $this->products = $category->products;

        if ($this->search) {
            $this->searchProducts();
        } else {
            $this->products = Product::all();
        }
    }

    public function searchProducts()
    {

        $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function addToCart($id)
    {
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

        return view('livewire.category-show', compact('categories'), ['products' => $this->products])->layout('layouts.base');
    }
}

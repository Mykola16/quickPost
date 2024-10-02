<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\SearchQuery;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesIndex extends Component
{
    public $category;
    public $products;

    public $view = 'list';
    public $view1 = 'all_prod';

    public $search = '';
    public $selectedRegion = '';


    protected $listeners = ['searchProducts' => 'searchProducts'];

    public function mount(Category $category, Request $request)
    {
        $this->search = $request->query('search', '');
        $this->selectedRegion = $request->query('region', '');

        $this->category = $category;
        $this->products = $category->products;

//        if ($this->search) {
//            $this->searchProducts();
//        } else {
//            $this->products = Product::all()->where('type', '!=', 'blocked');
//        }

        $this->searchProducts();
    }

    public function searchProducts()
    {

        if (!empty($this->search)) {
            // Знайти або створити запис для поточного запиту
            SearchQuery::updateOrCreate(
                ['query' => $this->search],
                ['count' => DB::raw('count + 1')]
            );
        }

        $query = Product::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedRegion)) {
            $query->where('region', 'like', '%' . $this->selectedRegion . '%');
        }

        $this->products = $query->orderBy('created_at', 'desc')->get();
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
        $productsVip = Product::where('type', '=', 'VIP')
            ->orderBy('created_at')
            ->take(8)
            ->get();

        $productsBisns = Product::where('type', '=', 'BSN')
            ->orderBy('created_at')
            ->take(8)
            ->get();

        $categories = Category::whereNull('category_id')
            ->with('subCategories')
            ->get();

        return view('livewire.category-show', compact('categories','productsVip', 'productsBisns'), ['products' => $this->products])->layout('layouts.base');
    }
}

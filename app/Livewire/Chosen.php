<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Product;
use App\Models\ShoppingCart;
use Livewire\Component;

class Chosen extends Component
{
    public $savedProducts = [];

    public function mount()
    {
        $this->loadSavedProducts();
    }

    public function loadSavedProducts()
    {
        $this->savedProducts = Product::whereIn('id', function($query) {
            $query->select('product_id')
                ->from('likes')
                ->where('user_id', auth()->id())
                ->where('liked', true);
        })->orderBy('created_at', 'desc')->get();
    }

    public function deleteLike($productId)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($like) {
            $like->delete();
            $this->loadSavedProducts(); // Обновить список избранного
            $this->dispatch('headerUpdated');
        }
    }

    public function render()
    {

        return view('livewire.chosen')->layout("layouts.profile");
    }
}

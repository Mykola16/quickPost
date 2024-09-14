<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SimpleSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $products = [];

    // Метод для виконання пошуку при натисканні кнопки
    public function searchProducts()
    {
        $this->resetPage(); // Скидання пагінації
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get(); // Пошук продуктів
    }

    public function render()
    {
        return view('livewire.simple-search', ['products' => $this->products])->layout('layouts.base');
    }
}

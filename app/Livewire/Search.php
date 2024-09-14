<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public $search = '';

    public function searchProducts()
    {
        return redirect()->route('categories.index', ['search' => $this->search]);
    }

    public function render()
    {
        return view('livewire.search');
    }
}



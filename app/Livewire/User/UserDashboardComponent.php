<?php

namespace App\Livewire\User;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public $allProducts;

    public function mount()
    {
        $user_id = Auth::id();
        $this->allProducts = Product::where('user_id', $user_id)->get();

    }

    public function render()
    {
        return view('livewire.user.user-dashboard-component', [
            'allProducts' => $this->allProducts
        ])->layout("layouts.profile");
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public $products;
    public $users;

    public function mount()
    {
        $this->products = Product::orderBy('created_at', 'desc')->take(10)->get();
        $this->users=User::all();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout("layouts.adminDashbord");
    }
}

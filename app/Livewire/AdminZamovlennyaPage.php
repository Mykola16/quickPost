<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminZamovlennyaPage extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('livewire.admin-zamovlennya-page', compact('orders'))->layout("layouts.adminDashbord");
    }
}

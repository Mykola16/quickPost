<?php

namespace App\Livewire;


use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.history', compact('orders'))
            ->layout("layouts.profile");
    }
}

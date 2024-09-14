<?php

namespace App\Livewire;

use App\Models\orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public function render()
    {
        $orders = orders::where('user_id', Auth::user()->id)->orderBy('created_at')->get();
        return view('livewire.history', compact('orders'))
            ->layout("layouts.profile");
    }
}

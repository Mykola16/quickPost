<?php

namespace App\Livewire;

use Livewire\Component;

class Chosen extends Component
{
    public function render()
    {
        return view('livewire.chosen')->layout("layouts.profile");
    }
}

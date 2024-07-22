<?php

namespace App\Livewire;

use Livewire\Component;

class SelectedComponent extends Component
{
    public function render()
    {
        return view('livewire.selected-component')->layout("layouts.base");
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class AdminZamovlennyaPage extends Component
{
    public function render()
    {
        return view('livewire.admin-zamovlennya-page')->layout("layouts.adminDashbord");
    }
}

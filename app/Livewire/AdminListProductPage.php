<?php

namespace App\Livewire;

use Livewire\Component;

class AdminListProductPage extends Component
{
    public function render()
    {
        return view('livewire.admin-list-product-page')->layout("layouts.adminDashbord");
    }
}

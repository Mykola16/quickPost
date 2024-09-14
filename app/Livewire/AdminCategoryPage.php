<?php

namespace App\Livewire;

use Livewire\Component;

class AdminCategoryPage extends Component
{
    public function render()
    {
        return view('livewire.admin-category-page')->layout("layouts.adminDashbord");
    }
}

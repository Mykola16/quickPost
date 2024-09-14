<?php

namespace App\Livewire;

use Livewire\Component;

class AdminReviewsPage extends Component
{
    public function render()
    {
        return view('livewire.admin-reviews-page')->layout("layouts.adminDashbord");
    }
}

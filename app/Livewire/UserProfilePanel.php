<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfilePanel extends Component
{
    protected $listeners = ['panelUpdated' => 'render'];

    public function render()
    {
        return view('livewire.user-profile-panel');
    }
}

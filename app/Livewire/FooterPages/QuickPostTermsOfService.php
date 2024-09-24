<?php

namespace App\Livewire\FooterPages;

use Livewire\Component;

class QuickPostTermsOfService extends Component
{
    public function render()
    {
        return view('livewire.footer-pages.quick-post-terms-of-service')->layout("layouts.base");
    }
}

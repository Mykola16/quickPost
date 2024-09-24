<?php

namespace App\Livewire\FooterPages;

use Livewire\Component;

class AboutQuickPost extends Component
{
    public function render()
    {
        return view('livewire.footer-pages.about-quick-post')->layout("layouts.base");
    }
}

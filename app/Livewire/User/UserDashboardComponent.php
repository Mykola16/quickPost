<?php

namespace App\Livewire\User;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public $allProducts;

    public $view = 'list';

    public $product;

    protected $listeners = ['userDashUpdated' => 'render'];

    public $showModal = false;
    public $selectedAdvertisementId;

    public function mount()
    {
        $user_id = Auth::id();
        $this->allProducts = Product::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

    }

    public function openDeleteConfirmation($id)
    {
        $this->selectedAdvertisementId = $id;
        $this->showModal = true;
    }

    public function deleteAdvertisement()
    {
        if ($this->selectedAdvertisementId) {
            $product = Product::find($this->selectedAdvertisementId);
            if ($product) {
                $product->delete(); // Видалення оголошення
                $this->dispatch('userDashUpdated');
                $this->showModal = false;
                session()->flash('message', 'Оголошення видалено');
            }
        }
    }


    public function render()
    {
        return view('livewire.user.user-dashboard-component', [
            'allProducts' => $this->allProducts
        ])->layout("layouts.profile");
    }
}

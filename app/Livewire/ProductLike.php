<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class ProductLike extends Component
{
    public $productId;
    public $liked = false;
    public $likeCount = 0;

    protected $listeners = ['likeUpdated' => 'render'];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->checkIfLiked();
        $this->updateLikeCount();
    }

    public function checkIfLiked()
    {
        $this->liked = Like::where('user_id', auth()->id())
            ->where('product_id', $this->productId)
            ->exists();
    }

    public function updateLikeCount()
    {
        $this->likeCount = Like::where('product_id', $this->productId)
            ->where('liked', true)
            ->count();
    }

    public function toggleLike()
    {
        $like = Like::where('user_id', auth()->id())
            ->where('product_id', $this->productId)
            ->first();

        if ($like) {
            if ($like->liked) {
                // Удалить лайк, если он был активным
                $like->delete();
            } else {
                // Обновить лайк, если он был неактивным
                $like->liked = true;
                $like->save();
            }
        } else {
            // Создать новый лайк
            Like::create([
                'user_id' => auth()->id(),
                'product_id' => $this->productId,
                'liked' => true
            ]);
        }

        $this->liked = !$this->liked;
        $this->updateLikeCount();
        $this->dispatch('headerUpdated');
    }


    public function render()
    {
        return view('livewire.product-like');
    }
}

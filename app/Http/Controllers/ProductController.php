<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function decrementViews(Product $product)
    {
        \Log::info('Decrementing views for product: ' . $product->id);

        $product->decrement('current_views');

        return response()->json(['status' => 'success']);
    }
}

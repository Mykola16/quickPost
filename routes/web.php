<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeComponent;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

use App\Livewire\CartComponent;
use App\Livewire\SelectedComponent;

use App\Livewire\User\UserDashboardComponent;
use App\Livewire\Admin\AdminDashboardComponent;

use App\Http\Controllers\CategoryController;

use App\Livewire\CategoriesIndex;
use App\Livewire\CategoryShow;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/' , \App\Livewire\HomeComponent::class )->name('Home');

Route::get('cart',\App\Livewire\CartComponent::class)->name('Cart');

Route::get("selected", \App\Livewire\SelectedComponent::class)->name('Selected');

Route::get('categories', CategoriesIndex::class)->name('categories.index');
Route::get('categories/{category}', CategoryShow::class)->name('categories.show');
Route::get('product/{id}', \App\Livewire\ProductShow::class)->name('product.show');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

 //For User and Customer:
//Route::middleware(['auth:sanctum', 'verified'])->group(function() {
//    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
//});
//
//// For Admin:
//Route::middleware(['auth:sanctum', 'verified', 'auth-admin'])->group(function() {
//    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
//});


Route::get('auth/google',[\App\Http\Controllers\GoogleController::class, 'googlepage'])->name('Googlepage');
Route::get('auth/google/callback',[\App\Http\Controllers\GoogleController::class, 'googlecallback'])->name('Googlecallback');

Route::get('auth/facebook',[\App\Http\Controllers\FacebookController::class, 'facebookpage'])->name('Facebookpage');
Route::get('auth/facebook/callback',[\App\Http\Controllers\FacebookController::class, 'facebookredirect'])->name('Facebookredirect');




<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeComponent;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

use App\Livewire\CartComponent;
use App\Livewire\OformlennyaComponent;

use App\Livewire\User\UserDashboardComponent;
use App\Livewire\Admin\AdminDashboardComponent;




use App\Livewire\CategoriesIndex;
use App\Livewire\CategoryShow;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/' , \App\Livewire\HomeComponent::class )->name('Home');

Route::get('cart',\App\Livewire\CartComponent::class)->name('Cart');

Route::get("oformlennya", \App\Livewire\OformlennyaComponent::class)->name('Oformlennya');

Route::get('categories', CategoriesIndex::class)->name('categories.index');
Route::get('categories/{category}', CategoryShow::class)->name('categories.show');
Route::get('product/{id}', \App\Livewire\ProductShow::class)->name('product.show');

Route::get('create', \App\Livewire\CreateAdvertisementPRV::class)->name('Create');



//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

// For User and Customer:
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::get('message', \App\Livewire\Message::class)->name('Message');
Route::get('chosen', \App\Livewire\Chosen::class)->name('Chosen');
Route::get('history', \App\Livewire\History::class)->name('History');
Route::get('reviews', \App\Livewire\Reviews::class)->name('Reviews');
Route::get('subscription', \App\Livewire\Subscription::class)->name('Subscription');
Route::get('settings', \App\Livewire\Settings::class)->name('Settings');


// For Admin:
Route::middleware(['auth:sanctum', 'verified', 'auth-admin'])->group(function() {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
//

Route::get('auth/google',[\App\Http\Controllers\GoogleController::class, 'googlepage'])->name('Googlepage');
Route::get('auth/google/callback',[\App\Http\Controllers\GoogleController::class, 'googlecallback'])->name('Googlecallback');

Route::get('auth/facebook',[\App\Http\Controllers\FacebookController::class, 'facebookpage'])->name('Facebookpage');
Route::get('auth/facebook/callback',[\App\Http\Controllers\FacebookController::class, 'facebookredirect'])->name('Facebookredirect');




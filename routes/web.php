<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\ContactComponent;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', HomeComponent::class);
Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/products', ShopComponent::class);

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/cart', CartComponent::class)->name('product.cart');
    Route::get('checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/thank_you', ThankyouComponent::class)->name('thankyou');
    Route::get('/contact', ContactComponent::class);
    Route::get('/contact-us', ContactComponent::class)->name('contact-us');

});
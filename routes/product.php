<?php

use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\TopSellingItemsComponent;
use App\Http\Livewire\TopOrderedItemsComponent;
use App\Http\Livewire\TopNewItemsComponent;
use App\Http\Livewire\TopReViewedItemsComponents;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
| Here is where you can register product routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

##############################  Product Routes  ##########################################################
Route::middleware(['auth:sanctum','verified'])->prefix('product')->group(function () {
    Route::get('/', ShopComponent::class);
    Route::get('details/{slug}', DetailsComponent::class)->name('product.details');
    Route::get('category/{category_slug}', CategoryComponent::class)->name('product.category');
    Route::get('search', SearchComponent::class)->name('product.search');
    Route::get('wishlist', WishListComponent::class)->name('product.wishlist');
    Route::get('TopOnSale', TopSellingItemsComponent::class)->name('product.toponsale');
    Route::get('TopOrdered', TopOrderedItemsComponent::class)->name('product.topordered');
    Route::get('TopNew', TopNewItemsComponent::class)->name('product.topnew');
    Route::get('TopReview', TopReViewedItemsComponents::class)->name('product.topreviewed');


});
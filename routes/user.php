<?php

//USERS
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\UserEditProfileComponent;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded  'verified'by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

###############################  User Routes  ###########################################################

Route::middleware(['auth:sanctum','verified'])->prefix('user')->group(function (){
    Route::get('/',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('Edit-profile',UserEditProfileComponent::class)->name('edit.profile');


    Route::prefix('orders')->group(function () {
        Route::get('/', UserOrderComponent::class)->name('user.orders');
        Route::get('details/{order_id}', UserOrderDetailsComponent::class)->name('user.order.details');
    });
    Route::get('review/{order_item_id}',UserReviewComponent::class)->name('user.item.review');
    Route::get('changePassword',UserChangePasswordComponent::class)->name('user.changePassword');

});


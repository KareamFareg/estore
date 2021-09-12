<?php


//ADMIN
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminShowPrivileges;
use App\Http\Livewire\Admin\AdminEmailConfigrationComponent;

use App\Http\Livewire\UserEditProfileComponent;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


###############################  Admin Routes  ###########################################################

Route::middleware(['auth:sanctum', 'verified','authadmin'])->prefix('admin')->group(function (){
    Route::get('dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/',AdminDashboardComponent::class);
    Route::get('edit-profile', UserEditProfileComponent::class)->name('admin.profile');
    Route::get('home-category',AdminHomeCategoryComponent::class)->name('admin.homecategory');
    Route::get('sale',AdminSaleComponent::class)->name('admin.sale');
    Route::get('contacts',AdminContactComponent::class)->name('admin.contacts');
    Route::get('Settings',AdminSettingComponent::class)->name('admin.settings');
    Route::get('Privileges',AdminShowPrivileges::class)->name('admin.privileges');
    Route::get('Add/configuration',AdminEmailConfigrationComponent::class)->name('configuration.store');


    //coupons Route
    Route::prefix('coupons')->group(function (){
    Route::get('/',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('add',AdminAddCouponComponent::class)->name('admin.coupon.add');
    Route::get('edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.coupon.edit');
    });
    //category Route
    Route::prefix('category')->group(function (){
        Route::get('/',AdminCategoryComponent::class)->name('admin.category');
        Route::get('add',AdminAddCategoryComponent::class)->name('admin.add.category');
        Route::get('edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.edit.category');
    });
    //products Route
    Route::prefix('products')->group(function (){
        Route::get('/',AdminProductComponent::class)->name('admin.products');
        Route::get('add',AdminAddProductComponent::class)->name('admin.add.products');
        Route::get('edit/{product_slug}',AdminEditProductComponent::class)->name('admin.edit.products');
    });
   // home slider Route
    Route::prefix('home-slider')->group(function (){
        Route::get('/',AdminHomeSliderComponent::class)->name('admin.homeslider');
        Route::get('add',AdminAddHomeSliderComponent::class)->name('admin.add.homeslider');
        Route::get('edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edit.homeslider');
    });
    //orders Route
    Route::prefix('orders')->group(function () {
        Route::get('/', AdminOrderComponent::class)->name('admin.orders');
        Route::get('details/{order_id}', AdminOrderDetailsComponent::class)->name('admin.order.details');
    });
});

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

route::get('/', [HomeController::class, 'home']);
route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

route::get('/my_orders', [HomeController::class, 'my_orders'])->
    middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->
    middleware(['auth', 'admin']);

route::get('category_page', [AdminController::class, 'category_page'])->
    middleware(['auth', 'admin']);

route::post('add_category', [AdminController::class, 'add_category'])->
    middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->
    middleware(['auth', 'admin']);

route::get('add_product', [AdminController::class, 'add_product'])->
    middleware(['auth', 'admin']);

route::post('create_product', [AdminController::class, 'create_product'])->
    middleware(['auth', 'admin']);

route::get('product_list', [AdminController::class, 'product_list'])->
    middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->
    middleware(['auth', 'admin']);

route::get('update_product/{id}', [AdminController::class, 'update_product'])->
    middleware(['auth', 'admin']);

route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->
    middleware(['auth', 'admin']);

route::get('product_details/{id}', [HomeController::class, 'product_details']);

route::get('shop', [HomeController::class, 'shop']);

route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->
    middleware(['auth', 'verified']);

route::get('my_cart', [HomeController::class, 'my_cart'])->
    middleware(['auth', 'verified']);

route::post('confirm_order', [HomeController::class, 'confirm_order'])->
    middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
        Route::get('stripe/{value}', 'stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });

route::get('orders', [AdminController::class, 'orders'])->
    middleware(['auth', 'admin']);
    
route::get('in_transit/{id}', [AdminController::class, 'in_transit'])->
    middleware(['auth', 'admin']);

route::get('delivered/{id}', [AdminController::class, 'delivered'])->
    middleware(['auth', 'admin']);
    
route::get('invoice/{id}', [AdminController::class, 'invoice'])->
    middleware(['auth', 'admin']);


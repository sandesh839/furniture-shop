<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

//users
Route::resource('users', UserController::class);

//pages
Route::get('/',[PagesController::class,'index'])->name('home');
Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');
Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');
Route::get('/search',[PagesController::class,'search'])->name('search');

Route::middleware('auth')->group(function(){
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    //my cart herna ko lagi route banako
    Route::get('mycart',[CartController::class,'mycart'])->name('mycart');
    Route::get('cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('checkout/{cartid}',[PagesController::class,'checkout'])->name('checkout');
    Route::get('order/{cartid}/store',[OrderController::class,'store'])->name('order.store');
    Route::post('order/store',[OrderController::class,'storecod'])->name('order.storecod');
});

Route::middleware(['auth','admin'])->group(function(){
//category
Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');


//product
Route::get('product',[ProductController::class,'index'])->name('product.index');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

//orders
Route::get('/orders',[OrderController::class,'index'])->name('order.index');
Route::get('/order/{id}/status/{status}',[OrderController::class,'status'])->name('order.status');
Route::get('myorder',[OrderController::class,'myorder'])->name('myorder');

//add new
Route::get('/viewproduct', [ProductController::class, 'index'])->name('viewproducts');
// Route::get('/onsale', [ProductController::class, 'onSale'])->name('onsale');
// Route::get('/allproduct', [ProductController::class, 'allProducts'])->name('allproduct');
// Route::get('/allproduct', [ProductController::class, 'allProducts'])->name('allproduct');




//Banners

// Route::get('banner',[BannersController::class,'index'])->name('banner.index');
// Route::post('/banner/store',[BannersController::class,'store'])->name('banner.store');
// Route::get('/banner/create',[BannersController::class,'create'])->name('banner.create');
// Route::get('/banner/{id}/edit',[BannersController::class,'edit'])->name('banner.edit');
// Route::post('/banner/{id}/update',[BannersController::class,'update'])->name('banner.update');
// Route::get('/banner/{id}/destroy',[BannersController::class,'destroy'])->name('banner.destroy');
});

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//profiles
Route::middleware(['auth'])->group(function () {
    // Route::resource('/dashboard/banners', BannersController::class);
});


require __DIR__.'/auth.php';

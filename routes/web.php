<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


//web routes
Route::get('/', function () {
    return view('home-page');
})->name('home');

Route::get('/products', function () {
    return view('products.index');
})->name('products-index');

Route::get('/products-details/{product}', function ($product) {
    $product = Product::find($product);
    return view('products.show', ['product' => $product]);
})->name('products-show-details');

Route::get('/categories/{slug}', function ($slug) {
    $category = Category::where('slug', $slug)->first();
    return view('categories.show', ['category' => $category]);
})->name('categories-show');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart-index');

// profile routes

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile-index');




// dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard-index');

Route::get('/dashboard/products/create', function () {
    return view('dashboard.products.create');
})->name('dashboard-products-create');

Route::get('/dashboard/products', function () {
    return view('dashboard.products.index');
})->name('dashboard-products-index');

Route::get('/dashboard/products/{product}/edit', function () {
    return view('dashboard.products.edit');
})->name('dashboard-products-edit');

// ordes routes

Route::get('/dashboard/orders', function () {
    return view('dashboard.orders.index');
})->name('dashboard-orders-index');

Route::get('/dashboard/orders/{order}', function () {
    return view('dashboard.orders.show');
})->name('dashboard-orders-show');

Route::get('/dashboard/orders/{order}/edit', function () {
    return view('dashboard.orders.edit');
})->name('dashboard-orders-edit');

// customers routes

Route::get('/dashboard/customers', function () {
    return view('dashboard.customers.index');
})->name('dashboard-customers-index');




<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(\App\Http\Middleware\AuthMiddleware::class)->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'DashboardController@index')->name('pages.dashboard');
    Route::post('/logout', 'AuthController@logout')->name('auth.logout');

    // USERS

    Route::get('/users/view/{id}', 'UserController@show')->name('pages.user.show');
    // PRODUCTS
    // Route::get('/products/view/{id}', 'UserController@show')->name('pages.product.show');
    Route::get('/products/view', 'ProductController@index')->name('pages.products.view');
    Route::get('/products/view/{id}', 'ProductController@show')->name('pages.product.view');
    Route::get('/products/create', 'ProductController@create')->name('pages.products.create');
    Route::post('/products/create', 'ProductController@store')->name('action.products.store');

    // CATEGORIES

    Route::post('/categories/create', 'CategoryController@store')->name('action.categories.store');

    // SUPPLIERS

    Route::get('/suppliers/view', 'SupplierController@index')->name('pages.suppliers.view');


    // PURCHASE ORDERS

    // Route::get('/purchases/view', 'SupplierController@index')->name('pages.purchases.view');
    // Route::get('/purchases/create', 'SupplierController@create')->name('pages.purchases.create');
    Route::post('/purchases/create', 'PurchaseItemController@store')->name('action.purchases.store');

    Route::get('/roles','RoleController@index')->name('pages.roles');

    Route::middleware(\App\Http\Middleware\UserPermission::class)->group(function () {
        // Route::get('/roles/create','RoleController@create')->name('pages.roles.create');
        // Route::post('/roles/create','RoleController@store')->name('action.roles.store');

        // Secure create and view users
        Route::get('/users/view', 'UserController@index')->name('pages.users.view');
        Route::get('/users/create', 'UserController@create')->name('pages.users.create');

        // Secure create and view suppliers
        Route::post('/suppliers/create', 'SupplierController@store')->name('action.suppliers.store');
        Route::get('/suppliers/create', 'SupplierController@create')->name('pages.suppliers.create');
    });

});
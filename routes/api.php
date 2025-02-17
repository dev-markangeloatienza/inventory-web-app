<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\RoleController;

// Route::apiResource('categories', 'CategoryController');

Route::namespace('App\Http\Controllers\Api')->group(function () {
  Route::get('/categories', [CategoryController::class, 'index']);
  Route::get('/categories/{id}', [CategoryController::class, 'show']);
  Route::get('/roles', [RoleController::class, 'index']);
  Route::get('/suppliers', [SupplierController::class, 'index']);

});

// Route::group(["prefix"=> "v1"], function () {
//   Route::resource("categories", CategoryController::class)->only(["index", "show"]);
// });
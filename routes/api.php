<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductParameterController;

Route::get('/', function () {
    return response()->json(['message' => 'Commerce API'], 200);
});

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Products
Route::resource('products',ProductController::class);
//Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);


Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// Product parameters
Route::get('/products/{id}/parameters', [ProductParameterController::class, 'index']);
Route::get('/products/{id}/parameters/{parameter_id}', [ProductParameterController::class, 'show']);
Route::post('/products/{id}/parameters', [ProductParameterController::class, 'store']);
Route::put('/products/{id}/parameters/{parameter_id}', [ProductParameterController::class, 'update']);
Route::delete('/products/{id}/parameters/{parameter_id}', [ProductParameterController::class, 'destroy']);



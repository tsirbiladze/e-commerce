<?php

use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about-us', 'aboutUs')->name('aboutUs');
Route::view('/products', 'products')->name('products');

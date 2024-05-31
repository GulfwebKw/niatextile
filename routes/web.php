<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about-us', 'aboutUs')->name('aboutUs');
Route::view('/products', 'products')->name('products');



Route::post('/subscribe', function (\Illuminate\Http\Request $request){
    $request->validate(['email'=>'required|email:rfc,dns']);
    $subscribe = new \App\Models\Subscribes();
    $subscribe->email = $request->input('email');
    $subscribe->save();
    return redirect()->back()->with('success', 'Your email had been subscribed.');
})->name('subscribe');
Route::get('lang/{lang}', function ($lang) {
    return redirect()->back()->withCookie(cookie('locale', $lang , 60 * 24 * 30));
})->name('lang.switch')->whereIn('lang', ['ar' , 'en']);;

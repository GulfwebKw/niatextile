<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about-us', 'aboutUs')->name('aboutUs');
Route::view('/products', 'products')->name('products');
Route::view('/contacts-us', 'contactsUs')->name('contactsUs');



Route::post('/subscribe', function (\Illuminate\Http\Request $request){
    $request->validate(['email_subscribe'=>'required|email:rfc,dns']);
    $subscribe = new \App\Models\Subscribes();
    $subscribe->email = $request->input('email_subscribe');
    $subscribe->save();
    return redirect()->back()->with('success', __('email_set'));
})->name('subscribe');
Route::post('/contact-us', function (\Illuminate\Http\Request $request){
    $request->validate([
        'trade_account_number'=>'nullable',
        'business_name'=>'nullable',
        'name'=>'required|string',
        'subject'=>'required|string',
        'message'=>'required|string|min:10',
        'email'=>'required|email:rfc,dns'
    ]);
    $message = new \App\Models\Message();
    $message->trade_account_number = $request->get('trade_account_number');
    $message->business_name = $request->get('business_name');
    $message->name = $request->get('name');
    $message->email = $request->get('email');
    $message->subject = $request->get('subject');
    $message->message = $request->get('message');
    $message->ip_address = $request->getClientIp();
    $message->save();
    return redirect()->back()->with('success2', __('message_sent'));
})->name('contactsUsSend');
Route::get('lang/{lang}', function ($lang) {
    return redirect()->back()->withCookie(cookie('locale', $lang , 60 * 24 * 30));
})->name('lang.switch')->whereIn('lang', ['ar' , 'en']);;

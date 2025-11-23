<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/quiz', function () {
    return view('quiz');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/joinus', function () {
    return view('JoinUs');
});
Route::get('/contact', function () {
    return view('contact');
});


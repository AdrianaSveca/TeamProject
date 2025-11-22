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
Route::get('/JoinUs', function () {
    return view('JoinUs');
});


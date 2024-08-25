<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/register', function () {
    return view('register');
});
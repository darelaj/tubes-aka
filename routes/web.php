<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('menu');
});

Route::get('/iteratif', function () {
    return view('iteratif');
});

Route::get('/rekursif', function () {
    return view('rekursif');
});

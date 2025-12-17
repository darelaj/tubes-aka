<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController;

Route::get('/', function () {
    return view('menu');
});

Route::get('/iteratif', function () {
    return view('iteratif', ['hasil' => session('hasil'), 'number' => session('number')]);
})->name('iteratif-tampilan');

Route::get('/perbandingan', function () {
    return view('perbandingan');
});

Route::get('/rekursif', function () {
    return view('rekursif');
});

Route::post('/hitung-iteratif', [CalculateController::class, 'calculateIteratif'])->name('iteratif');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/computer', function () {
    return view('computer');
})->name('computer');

Route::get('/console', function () {
    return view('console');
})->name('console');

Route::get('/misc', function () {
    return view('misc');
})->name('misc');

Route::get('/nongame', function () {
    return view('nongame');
})->name('nongame');

Route::get('/downloads', function () {
    return view('downloads');
})->name('downloads');

Route::get('/discs', function () {
    return view('discs');
})->name('discs');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

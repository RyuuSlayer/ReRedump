<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\RoleController;

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

Route::get('/discs', function () {
    return view('discs');
})->name('discs');

Route::get('/nongame-discs', function () {
    return view('nongame-discs');
})->name('nongame-discs');

Route::get('/downloads', function () {
    return view('downloads');
})->name('downloads');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('main');
    })->name('dashboard');

    // User Management Routes
    Route::prefix('admin')->group(function () {
        // Users - accessible by both admin and moderator
        Route::resource('users', UserManagementController::class)->middleware(['role:admin|moderator']);
        
        // Roles - accessible only by admin
        Route::resource('roles', RoleController::class)->middleware(['role:admin']);
    });
});

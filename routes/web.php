<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class,'index'])->name('home');


Route::get('/users', [AdminController::class,'index'])->name('users');

Route::get('/foodmenu', [AdminController::class,'foodmenu'])->name('foodmenu');
Route::post('/addfood', [AdminController::class,'addfood'])->name('addfood');

Route::get('/delete/{id}', [AdminController::class,'deleteUser'])->name('delete');


Route::get('/redirects', [HomeController::class,'redirects']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

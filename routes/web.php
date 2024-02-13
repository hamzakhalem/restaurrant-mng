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

Route::post('/addtocart/{id}', [HomeController::class,'addtocart'])->name('addtocart');

Route::get('/users', [AdminController::class,'index'])->name('users');

Route::get('/foodmenu', [AdminController::class,'foodmenu'])->name('foodmenu');

Route::get('/cheflist', [AdminController::class,'cheflist'])->name('cheflist');
Route::post('/addchef', [AdminController::class,'addchef'])->name('addchef');
Route::get('/deletechef/{id}', [AdminController::class,'deletechef'])->name('deletechef');
Route::get('/updatechefpage/{id}', [AdminController::class,'updatechefpage'])->name('updatechefpage');
Route::post('/updatechef', [AdminController::class,'updatechef'])->name('updatechef');

Route::get('/reservatuionpage', [AdminController::class,'reservatuionpage'])->name('reservatuionpage');
Route::post('/addfood', [AdminController::class,'addfood'])->name('addfood');
Route::post('/updatefood', [AdminController::class,'updatefood'])->name('updatefood');

Route::get('/delete/{id}', [AdminController::class,'deleteUser'])->name('delete');
Route::get('/deletefood/{id}', [AdminController::class,'deleteFood'])->name('deletefood');
Route::get('/updatefoodpage/{id}', [AdminController::class,'updatefoodpage'])->name('updatefoodpage');

Route::post('/reservation', [AdminController::class,'reservation'])->name('reservation');

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

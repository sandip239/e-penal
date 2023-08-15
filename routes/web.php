<?php

use App\Http\Controllers\admincontroller;
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
    return view('welcome');
});

Route::get('index', [admincontroller::class, 'index'])->name('dashboard');
Route::get('user-regiser', [admincontroller::class, 'userRegister'])->name('user-register');
Route::post('user-data', [admincontroller::class, 'userData'])->name('user-data');
Route::get('edit-user/{id}',[admincontroller::class,'editUser'])->name('edit-user');
Route::post('update-user',[admincontroller::class,'updateUser'])->name('update-user');


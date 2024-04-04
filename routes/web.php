<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\UnderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

//Route Dashbord - Page
Route::resource('/home', HomeController::class)->middleware(['auth', 'verified']);

//Route Two-factor-Page
Route::resource('two-factor-authentication', TwoFactorController::class);

//Route Create under - users

Route::resource('/Gestion+Utilisateurs',UnderController::class);
Route::GET('/Gestion+utilisateur/edit/{id}', [UnderController::class, 'edit'])->name('under.edit');
Route::put("/update+utilisateur", [UnderController::class, 'update'])->name('update-under');
Route::delete("/delete+utilisateur", [UnderController::class, 'destroy'])->name('delete-under');

//Route profil
Route::resource('/Gestion+Profile',ProfileController::class);
Route::put("/update+profile", [ProfileController::class, 'update'])->name('update-profile');


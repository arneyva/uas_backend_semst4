<?php

use App\Http\Controllers\Agama61Controller;
use App\Http\Controllers\Auth61Controller;
use App\Http\Controllers\Detaildata61Controller;
use App\Http\Controllers\User61Controller;
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
    return view('welcome', [
        'page' => 'Home',
    ]);
})->middleware('auth');

// auth
Route::get('/login61', [Auth61Controller::class, 'login'])->name('login');
Route::get('/register61', [Auth61Controller::class, 'register'])->name('auth61.register');
Route::get('/logout61', [Auth61Controller::class, 'logout'])->name('auth61.logout');

Route::post('/login61', [Auth61Controller::class, 'loginP'])->name('auth61.loginP');
Route::post('/register61', [Auth61Controller::class, 'registerP'])->name('auth61.registerP');

Route::middleware('auth')->group(function () {
    // agama
    Route::resource('/agama61', Agama61Controller::class)->middleware('admin');

    // my
    Route::get('/myprofile61', [User61Controller::class, 'myprofile'])->name('user61.myprofile');
    Route::put('/myprofile61/edit/image/{id}', [User61Controller::class, 'editimage'])->name('user61.editimage');
    Route::put('/myprofile61/edit/password/{id}', [User61Controller::class, 'editpassword'])->name('user61.editpassword');

    // user
    Route::resource('/user61', User61Controller::class)->middleware('admin');

    // detail
    Route::resource('/detaildata61', Detaildata61Controller::class);
});

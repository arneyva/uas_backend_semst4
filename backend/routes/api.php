<?php

use App\Http\Controllers\Api\Agama61Controller;
use App\Http\Controllers\api\Detaildata61Controller;
use App\Http\Controllers\api\User61Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('/agama61', Agama61Controller::class);

route::resource('/detaildata61', DetailData61Controller::class);

route::resource('/user61', User61Controller::class);
Route::put('/user61/update/image/{id}', [User61Controller::class, 'editimage'])->name('user61.editimage');
Route::put('/user61/update/password/{id}', [User61Controller::class, 'editpassword'])->name('user61.editpassword');

// detail
route::resource('/detaildata61', Detaildata61Controller::class);

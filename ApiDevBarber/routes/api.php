<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;

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


Route::get('/ping', function() {
    return ['pong' => true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('unauthorized');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('auth/refresh', [AuthController::class, 'refresh'])->name('refresh');
Route::post('/user', [AuthController::class, 'create'])->name('createUser');

Route::get('/user', [UserController::class, 'read'])->name('getUser');
Route::put('/user', [UserController::class, 'update'])->name('updateUser');
Route::get('/user/favorites', [UserController::class, 'getFavorites'])->name('getFavoriteBarber');
Route::post('/user/favorite', [UserController::class, 'addFavorite'])->name('addFavoriteBarber');
Route::get('/user/appointments', [UserController::class, 'getAppointments'])->name('getAppointments');

Route::get('/barbers', [BarberController::class, 'list'])->name('listBarbers');
Route::get('/barber/{id}', [BarberController::class, 'one'])->name('getBarber');
Route::post('/barber/{id}/appointment', [BarberController::class, 'setAppointment'])->name('setAppointment');

Route::get('/search', [BarberController::class, 'search'])->name('searchBarber');

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

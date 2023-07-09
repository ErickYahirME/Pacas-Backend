<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get all Sex
Route::get('genero', [SexController::class, 'getSex']);
// get all Sex by Id
Route::get('genero/{id}', [SexController::class, 'getSexById']);
// add Sex
Route::post('addGenero', [SexController::class, 'addSex']);
// update Sex
Route::put('updateGenero/{id}', [SexController::class, 'updateSex']);
// delete Sex
Route::delete('deleteGenero/{id}', [SexController::class, 'deleteSex']);



Route::post('register', [RegisterController::class, 'register']);




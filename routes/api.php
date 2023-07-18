<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfile;
use App\Http\Controllers\CartUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeClotheController;
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


// Auth
Route::group(['middleware'=>'auth:api'], function(){
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('profile', [UserProfile::class, 'userDetails'])->middleware('auth:api');
    Route::get('product', [ProductController::class, 'getAllProduct'])->middleware('auth:api');

    // get all Sex
    Route::get('genero', [SexController::class, 'getSex'])->middleware('auth:api');
    // get all Sex by Id
    Route::get('genero/{id}', [SexController::class, 'getSexById'])->middleware('auth:api');
    // add Sex
    Route::post('addGenero', [SexController::class, 'addSex'])->middleware('auth:api');
    // update Sex
    Route::put('updateGenero/{id}', [SexController::class, 'updateSex'])->middleware('auth:api');
    // delete Sex
    Route::delete('deleteGenero/{id}', [SexController::class, 'deleteSex'])->middleware('auth:api');


    Route::get('product/{id}', [ProductController::class, 'getProductById'])->middleware('auth:api');
    Route::post('addProduct', [ProductController::class, 'addProduct'])->middleware('auth:api');
    Route::put('updateProduct/{id}', [ProductController::class, 'updateProduct'])->middleware('auth:api');
    Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->middleware('auth:api');
    Route::get('product/author/{author}', [ProductController::class, 'getProductByAuthor'])->middleware('auth:api');

    // get all Size
    Route::get('talla', [SizeController::class, 'getSize'])->middleware('auth:api');
    // get all size by Id
    Route::get('talla/{id}', [SizeController::class, 'getSizeById'])->middleware('auth:api');
    // add size
    Route::post('addTalla', [SizeController::class, 'addSize'])->middleware('auth:api');
    // updare size
    Route::put('updateTalla/{id}', [SizeController::class, 'updateSize'])->middleware('auth:api');
    //delete size
    Route::delete('deleteTalla/{id}', [SizeController::class, 'deleteSize'])->middleware('auth:api');

    //get all typeClothe
    Route::get('tipoRopa', [TypeClotheController::class, 'getTypeClothe'])->middleware('auth:api');
    //get all typeClothe by id
    Route::get('tipoRopa/{id}', [TypeClotheController::class, 'getTypeClotheById'])->middleware('auth:api');
    //add typeClothe
    Route::post('addTipoRopa', [TypeClotheController::class, 'addTypeClothe'])->middleware('auth:api');
    // update typeclothe
    Route::put('updateTypeClothe/{id}', [TypeClotheController::class, 'updateTypeClothe'])->middleware('auth:api');
    //delete typeclothe
    Route::delete('deleteTypeClothe/{id}', [TypeClotheController::class, 'deleteTypeClothe'])->middleware('auth:api');

    // Route::get('cart', [CartUserController::class, 'getCart']);
    Route::get('cart/{id}', [CartUserController::class, 'getCartById'])->middleware('auth:api');
    Route::get('cart/user/{user}', [CartUserController::class, 'getCartByUser'])->middleware('auth:api');
    Route::post('addCart', [CartUserController::class, 'addCart'])->middleware('auth:api');
    Route::put('updateCart/{id}', [CartUserController::class, 'updateCart'])->middleware('auth:api');
    Route::delete('deleteCart/{id}', [CartUserController::class, 'deleteCart'])->middleware('auth:api');
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);




























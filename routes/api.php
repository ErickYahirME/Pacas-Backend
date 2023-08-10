<?php

use Tymon\JWTAuth\Http\Middleware\Authenticate;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfile;
use App\Http\Controllers\CartUserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TypeClotheController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserProfile::class, 'userDetails']);
    Route::get('product', [ProductController::class, 'getAllProduct']);

    Route::get('allProduct', [ProductController::class, 'getAllProduct']);
    Route::get('product/{id}', [ProductController::class, 'getProductById']);
    Route::post('addProduct', [ProductController::class, 'addProduct']);
    Route::put('updateProduct/{id}', [ProductController::class, 'updateProduct']);
    // Route::post('updateProductChido/{id}', [ProductController::class, 'hola']);
    Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('product/author/{author}', [ProductController::class, 'getProductByAuthor']);

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

    // get all Size
    Route::get('talla', [SizeController::class, 'getSize']);
    // get all size by Id
    Route::get('talla/{id}', [SizeController::class, 'getSizeById']);
    // add size
    Route::post('addTalla', [SizeController::class, 'addSize']);
    // updare size
    Route::put('updateTalla/{id}', [SizeController::class, 'updateSize']);
    //delete size
    Route::delete('deleteTalla/{id}', [SizeController::class, 'deleteSize']);

    //get all typeClothe
    Route::get('tipoRopa', [TypeClotheController::class, 'getTypeClothe']);
    //get all typeClothe by id
    Route::get('tipoRopa/{id}', [TypeClotheController::class, 'getTypeClotheById']);
    //add typeClothe
    Route::post('addTipoRopa', [TypeClotheController::class, 'addTypeClothe']);
    // update typeclothe
    Route::put('updateTypeClothe/{id}', [TypeClotheController::class, 'updateTypeClothe']);
    //delete typeclothe
    Route::delete('deleteTypeClothe/{id}', [TypeClotheController::class, 'deleteTypeClothe']);

    // Route::get('cart', [CartUserController::class, 'getCart']);
    Route::get('cart/{id}', [CartUserController::class, 'getCartById'])->middleware('auth:api');
    Route::get('cart/user/{user}', [CartUserController::class, 'getCartByUser'])->middleware('auth:api');
    Route::post('addCart', [CartUserController::class, 'addCart'])->middleware('auth:api');
    Route::put('updateCart/{id}', [CartUserController::class, 'updateCart'])->middleware('auth:api');
    Route::delete('deleteCart/{id}', [CartUserController::class, 'deleteCart'])->middleware('auth:api');

    Route::get('cart/{id}', [CartUserController::class, 'getCartById']);
    Route::get('cart/user/{user}', [CartUserController::class, 'getCartByUser']);
    Route::post('addCart', [CartUserController::class, 'addCart']);
    Route::put('updateCart/{id}', [CartUserController::class, 'updateCart']);
    Route::delete('deleteCart/{id}', [CartUserController::class, 'deleteCart']);


    Route::get('downloadImage/{product}/image', [ProductController::class, 'downloadImage']);

   // get all role
    Route::get('role', [RoleController::class, 'getRole'])->middleware('auth:api');
    //get role by id
    Route::get('role/{id}', [RoleController::class, 'getRoleById'])->middleware('auth:api');
    //add role
    Route::post('addRole', [RoleController::class, 'addRole'])->middleware('auth:api');
    //update role
    Route::put('updateRole/{id}', [RoleController::class, 'updateRole'])->middleware('auth:api');
    //delete role
    Route::delete('deleteRole/{id}', [RoleController::class, 'deleteRole'])->middleware('auth:api');

});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('validarToken', [TokenController::class, 'validarToken']);

// Auth
// Route::group(['middleware'=>'auth:api'], function(){});


// Route::post('tokenValidar', [TokenController::class, 'validateToken']);
// Route::post('tokenValidar2', [TokenController::class, 'validateToken2']);


























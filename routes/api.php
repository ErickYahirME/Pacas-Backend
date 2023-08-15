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
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MethodPayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\ShoppingController;

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
    Route::get('cart/{id}', [CartUserController::class, 'getCartById']);
    Route::get('cart/user/{user}', [CartUserController::class, 'getCartByUser']);
    Route::post('addCart', [CartUserController::class, 'addCart']);
    Route::put('updateCart/{id}', [CartUserController::class, 'updateCart']);
    Route::delete('deleteCart/{id}', [CartUserController::class, 'deleteCart']);
    Route::delete('/clearCart/{userId}', [CartUserController::class, 'clearCart']);


    Route::get('downloadImage/{product}/image', [ProductController::class, 'downloadImage']);

   // get all role
    Route::get('role', [RoleController::class, 'getRole']);
    //get role by id
    Route::get('role/{id}', [RoleController::class, 'getRoleById']);
    //add role
    Route::post('addRole', [RoleController::class, 'addRole']);
    //update role
    Route::put('updateRole/{id}', [RoleController::class, 'updateRole']);
    //delete role
    Route::delete('deleteRole/{id}', [RoleController::class, 'deleteRole']);



    //get all address
    Route::get('address', [AddressController::class, 'getAddress']);
    //get addres by id
    Route::get('address/{id}', [AddressController::class, 'getAddresById']);
    //add address
    Route::post('addAddress', [AddressController::class, 'addAddress']);
    //update address
    Route::put('updateAddress/{id}', [AddressController::class, 'updateAddress']);
    //delete Address
    Route::delete('deleteAddress/{id}', [AddressController::class, 'deleteAddress']);
    Route::get('getAddressByUser/{id}', [AddressController::class, 'getAddressByUser']);



    Route::get('getShoppingByUser/{id}', [ShoppingController::class, 'getShoppingByUser']);
    Route::post('addShoppingByUser', [ShoppingController::class, 'addShopping']);

    Route::get('getShippingMethod', [ShippingMethodController::class, 'getShippingMethod']);

    //get all payment method
    Route::get('paymentMethod', [MethodPayController::class, 'getPaymentMethod']);
    //get payment method by id
    Route::get('paymentMethod/{id}', [MethodPayController::class, 'getPaymentMethodById']);
    //add payment method
    Route::post('addPaymentMethod', [MethodPayController::class, 'addPaymentMethod']);
    //update payment method
    Route::put('updatePaymentMethod/{id}', [MethodPayController::class, 'updatePaymentMethod']);
    //delete payment method
    Route::delete('deletePaymentMethod/{id}', [MethodPayController::class, 'deletePaymentMethod']);


    //get all shipping method
    Route::get('shippingMethod',[ShippingMethodController::class, 'getShippingMethod']);
    //get shippingmethod by id
    Route::get('shippingMethod/{id}',[ShippingMethodController::class, 'getShippingMethodById']);
    //add shipping method
    Route::post('addShippingMethod',[ShippingMethodController::class, 'addShippingMethod']);
    //update shipping method
    Route::put('updateShippingMethod/{id}',[ShippingMethodController::class, 'updateShippingMethod']);
    //delete shipping method
    Route::delete('deleteShippingMethod/{id}',[ShippingMethodController::class, 'deleteShippingMethod']);
    //get shipping method by id
    Route::get('getShippingMethodByUser/{id}',[ShippingMethodController::class, 'getShippingMethodByUser']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('validarToken', [TokenController::class, 'validarToken']);

// Auth
// Route::group(['middleware'=>'auth:api'], function(){});


// Route::post('tokenValidar', [TokenController::class, 'validateToken']);
// Route::post('tokenValidar2', [TokenController::class, 'validateToken2']);


























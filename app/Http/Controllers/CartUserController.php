<?php

namespace App\Http\Controllers;

use App\Models\cartUser;
use Illuminate\Http\Request;

class CartUserController extends Controller
{
    //

    public function getCartUser()
    {
        return response()->json(cart::all(), 200);
    }

    
    public function addCartUser(Request $request){
        $cart = cart::create($request->all());
        return response($cart, 201);
    }

    public function updateCartUser(Request $request, $id){
        $cart = cart::find($id);
        if(is_null($cart)){
            return response()->json(['message' => 'Cart Not Found'], 404);
        }
        $cart->update($request->all());
        return response($cart, 200);
    }

    public function deleteCartUser($id){
        $cart = cart::find($id);
        if(is_null($cart)){
            return response()->json(['message'=> 'Cart Not Found'], 404);
        }
        $cart->delete();
        return response()->json(['message'=>'Cart Deleted',null], 204);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;

class CartUserController extends Controller
{
    //

    public function getCart()
    {
        return response()->json(cart::all(), 200);
    }

    
    public function addCart(Request $request){
        $cart = cart::create($request->all());
        return response($cart, 201);
    }

    public function updateCart(Request $request, $id){
        $cart = cart::find($id);
        if(is_null($cart)){
            return response()->json(['message' => 'Cart Not Found'], 404);
        }
        $cart->update($request->all());
        return response($cart, 200);
    }

    public function deleteCart($id){
        $cart = cart::find($id);
        if(is_null($cart)){
            return response()->json(['message'=> 'Cart Not Found'], 404);
        }
        $cart->delete();
        return response()->json(['message'=>'Cart Deleted',null], 204);
    }
}
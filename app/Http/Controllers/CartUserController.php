<?php

namespace App\Http\Controllers;

use App\Models\cartUser;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class CartUserController extends Controller
{
    //

    public function getCart()
    {
        return response()->json(cartUser::all(), 200);
    }

    public function getCartById($id)
    {
        $cart = cartUser::find($id);
        if(is_null($cart)){
            return response()->json(['message'=>'Cart Not Found'], 404);
        }
        return response()->json(cartUser::find($id), 200);
    }

    public function getCartByUser($user){
        $cart = cartUser::where('user_id', $user)
        ->addSelect([
            'user' =>User::select('name')
            ->whereColumn('user_id','id')
        ])
        ->addSelect([
            'product' =>product::select('name')
            ->whereColumn('product_id','id')
        ])
        ->get();
        if(is_null($cart)){
            return response()->json(['message' => 'Cart Not Found'], 404);
        }
        return response()->json($cart, 200);
    }

    public function addCart(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required'
        ]);
        $cart = cartUser::create($request->all());
        return response($cart, 201);
    }

    public function updateCart(Request $request, $id){
        $cart = cartUser::find($id);
        if(is_null($cart)){
            return response()->json(['message' => 'Cart Not Found'], 404);
        }
        $cart->update($request->all());
        return response($cart, 200);
    }

    public function deleteCart($id){
        $cart = cartUser::find($id);
        if(is_null($cart)){
            return response()->json(['message'=> 'Cart Not Found'], 404);
        }
        $cart->delete();
        return response()->json(['message'=>'Cart Deleted',null], 204);
    }
}

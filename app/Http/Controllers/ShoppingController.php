<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\shopping;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{

    public function getShoppingByUser($user){
        $shopping = shopping::where('user_id', $user)

        ->addSelect([
            'address' =>address::select('address')
            ->whereColumn('address_id','id')
        ])
        ->get();
    }

    public function addShopping(Request $request){

        $shopping = shopping::create($request->all());
        return response($shopping, 201);
    }
}

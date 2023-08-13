<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function getShippingMethod()
    {
        return response()->json(shippingMethod::all(), 200);
    }

    public function getShippingMethodById($id)
    {
        $shippingMethod = shippingMethod::find($id);
        if(is_null($shippingMethod)){
            return response()->json(['message'=>'Shipping Method not found'], 404);
        }
        return response()->json($shippingMethod::find($id), 200);
    }

    public function addShippingMethod(Request $request)
    {
        $request->validatee([

        ]);
        $shippingMethod = shippingMethod::create($request->all());
        return response($shippingMethod, 200);
    }

    public function updateShippingMethod(Request $request, $id)
    {
        $shippingMethod = shippingMethod::find($id);
        if(is_null($shippingMethod)){
            return response()->json(['message'=>'Shipping method not found'], 404);
        }
        $shippingMethod->update($request->all());
        return response($shippingMethod, 200);
    }


}

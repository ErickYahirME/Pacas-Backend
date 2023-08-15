<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function getShippingMethod()
    {
        try{
            return response()->json(shippingMethod::all(), 200);
        } catch(\Exception $e){
            return response()->json(['message' => 'Error: '.$e->getMessage()], 500);
        }
        
    }

    public function getShippingMethodById($id)
    {
        $shippingMethod = shippingMethod::find($id);
        if(is_null($shippingMethod)){
            return response()->json(['message'=>'Shipping Method not found'], 404);
        }
        return response()->json($shippingMethod::find($id), 200);
    }

    public function getShippingMethodByUser($user){
        $shippingMethod = shippingMethod::where('idUser', $user)->get();
        if(is_null($shippingMethod)){
            return response()->json(['message' => 'Shipping method not found'], 404);
        }
        return response()->json($shippingMethod, 200);
    }

    public function addShippingMethod(Request $request)
    {
        try{
            $request->validate([
                'paqueteria'=>'required',
                'idUser' => 'required|exists:users,id'
            ]);
            $shippingMethod = shippingMethod::create($request->all());
            return response($shippingMethod, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error:'.$e->getMessage()], 500);
        }
        
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

    public function deleteShippingMethod($id)
    {
        $shippingMethod = shippingMethod::find($id);
        if(is_null($shippingMethod)){
            return response()->json(['message' => 'Shipping method no foud'], 200);
        }
        $shippingMethod->delete();
        return response()->json(['message' => 'Shipping method deleted']);
    }


}

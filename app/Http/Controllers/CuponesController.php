<?php

namespace App\Http\Controllers;

use App\Models\cupones;
use Illuminate\Http\Request;

class CuponesController extends Controller
{
    //

    public function getCupones()
    {
        Return response()->json(cupones::all(), 200);
    }

    public function getCuponesById($id)
    {
        $cupones = cupones::find($id);
        if(is_null($cupones)){
            return response()->json(['message'=>'Cupon not found'], 404);
        }
        return response()->json(cupones::find($id), 200);
    }

    public function addCupones(Request $request)
    {
        $cupones = cupones::create($request->all());
        return response($cupones, 201);
    }

    public function updateCupones(Request $request, $id)
    {
        $cupones = cupones::find($id);
        if(is_null($cupones)){
            return response()-> json(['message'=>'Cupon not found'], 404);
        }
        $cupones->update($request->all());
        return response($cupones, 200);
    }

    public function deleteCupones($id)
    {
        $cupones = cupones::find($id);
        if(is_null($cupones)){
            return response()->json(['message'=> 'Cupon not found'], 404);
        }
        $cupones->delete();
        return response()->json(['message'=> 'Cupon deleted', null], 204);
    }
}

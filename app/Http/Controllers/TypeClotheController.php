<?php

namespace App\Http\Controllers;

use App\Models\typeClothe as tclothe;
use Illuminate\Http\Request;

class TypeClotheController extends Controller
{
    public function getTypeClothe()
    {
        Return response()->json(tClothe::all(), 200);
    }

    public function getTypeClotheById($id)
    {
        $tClothe = tClothe::find($id);
        if(is_null($tClothe)){
            return response()->json(['message'=>'Type of clothe not found'], 404);
        }
        return response()->json($tClothe::find($id), 200);
    }

    public function addTypeClothe(Request $request)
    {
        $tClothe = tClothe::create($request->all());
        return response($tClothe, 201);
    }

    public function updateTypeClothe(Request $request, $id)
    {
        $tClothe = tClothe::find($id);
        if(is_null($tClothe)){
            return response()-> json(['message'=>'Type of clothe not found'], 404);
        }
        $tClothe->update($request->all());
        return response($tClothe, 200);
    }

    public function deleteTypeClothe($id)
    {
        $tClothe = tClothe::find($id);
        if(is_null($tClothe)){
            return response()->json(['message'=> 'Type of clothe not found'], 404);
        }
        $tClothe->delete();
        return response()->json(['message'=> 'Type of clothe deleted', null], 204);
    }
}

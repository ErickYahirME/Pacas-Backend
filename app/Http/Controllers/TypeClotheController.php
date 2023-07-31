<?php

namespace App\Http\Controllers;

use App\Models\typeClothe;
use Illuminate\Http\Request;

class TypeClotheController extends Controller
{
    public function getTypeClothe()
    {
        Return response()->json(typeClothe::all(), 200);
    }

    public function getTypeClotheById($id)
    {
        $typeClothe = typeClothe::find($id);
        if(is_null($typeClothe)){
            return response()->json(['message'=>'Type of clothe not found'], 404);
        }
        return response()->json($typeClothe::find($id), 200);
    }

    public function addTypeClothe(Request $request)
    {
        $request->validate([
            'name_clothe'=>'required',
        ]);
        $typeClothe = typeClothe::create($request->all());
        return response($typeClothe, 201);
    }

    public function updateTypeClothe(Request $request, $id)
    {
        $typeClothe = typeClothe::find($id);
        if(is_null($typeClothe)){
            return response()-> json(['message'=>'Type of clothe not found'], 404);
        }
        $typeClothe->update($request->all());
        return response($typeClothe, 200);
    }

    public function deleteTypeClothe($id)
    {
        $typeClothe = typeClothe::find($id);
        if(is_null($typeClothe)){
            return response()->json(['message'=> 'Type of clothe not found'], 404);
        }
        $typeClothe->delete();
        return response()->json(['message'=> 'Type of clothe deleted', null], 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function getSize()
    {
        Return response()->json(size::all(), 200);
    }

    public function getSizeById($id)
    {
        $size = size::find($id);
        if(is_null($size)){
            return response()->json(['message'=>'Size not found'], 404);
        }
        return response()->json($size::find($id), 200);
    }

    public function addSize(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);
        $size = size::create($request->all());
        return response($size, 201);
    }

    public function updateSize(Request $request, $id)
    {
        $size = size::find($id);
        if(is_null($size)){
            return response()-> json(['message'=>'Size not found'], 404);
        }
        $size->update($request->all());
        return response($size, 200);
    }

    public function deleteSize($id)
    {
        $size = size::find($id);
        if(is_null($size)){
            return response()->json(['message'=> 'Size not found'], 404);
        }
        $size->delete();
        return response()->json(['message'=> 'Size deleted', null], 204);
    }
}

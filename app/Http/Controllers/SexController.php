<?php

namespace App\Http\Controllers;

use App\Models\sex;
use Illuminate\Http\Request;

class SexController extends Controller
{

    public function getSex()
    {
        return response()->json(sex::all(), 200);
    }

    public function getSexById($id){
        $sex = sex::find($id);
        if(is_null($sex)){
            return response()->json(['message' => 'Sex Not Found'], 404);
        }
        return response()->json($sex::find($id), 200);
    }

    public function addSex(Request $request){
        $request->validate([
            'sex'=>'required',
        ]);
        $sex = sex::create($request->all());
        return response($sex, 201);
    }

    public function updateSex(Request $request, $id){
        $sex = sex::find($id);
        if(is_null($sex)){
            return response()->json(['message' => 'Sex Not Found'], 404);
        }
        $sex->update($request->all());
        return response($sex, 200);
    }

    public function deleteSex($id){
        $sex = sex::find($id);
        if(is_null($sex)){
            return response()->json(['message'=> 'Sex Not Found'], 404);
        }
        $sex->delete();
        return response()->json(['message'=>'Sex Deleted',null], 204);
    }
}

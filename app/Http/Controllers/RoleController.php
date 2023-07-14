<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getRole()
    {
        return response()->json (role::all(), 200);
    }

    public function getRoleById($id)
    {
        $role = role::find($id);
        if(is_null($role)){
            return response()->json(['message'=>'Role not found'], 404);
        }
        return response()->json($role::find($id), 200);
    }

    public function addRole(Request $request)
    {
        $role = role::create($request->all());
        return response($role, 201);
    }

    public function updateRole(Request $request)
    {
        $role = role::find($id);
        if(is_null($role)){
            return response()-> json(['message'=>'Type of Role not found'], 404);
        }
        $role->update($request->all());
        return response($role, 200); 
    }

    public function deleteRole($id)
    {
        $role = role::find($id);
        if(is_null($role)){
            return response()->json(['messaje'=>'Role not found'], 404);
        }
        $role->delete();
        return response()->json(['messaje'=>'Role deleted', null],  204);
    }
}

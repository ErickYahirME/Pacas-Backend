<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    
    public function getAddress()
    {
        try{

            return response()->json(address::all(), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function getAddresById($id)
    {
        $address = address::find($id);
        if(is_null($address)){
            return response()->json(['message' => 'Address not found'], 404);
        }
        return response()->json($address::find($id), 200);
    }

    public function addAddress(Request $request)
    {
        try{

            $request->validate([
                'calle' => 'required',
                'numExt' => 'required',
                'numInt' => 'required',
                'colonia' => 'required',
                'municipio' => 'required|string',
                'estado' => 'required|string',
                'pais' => 'required|string',
                'codigoPostal' => 'required',
                'idUser' => 'required|exists:users,id'
            ]);
            
            $address = address::create($request->all());
            return response($address, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function updateAddress(Request $request, $id)
    {
        $address = address::find($id);
        if(is_null($address)){
            return response()->json(['message' => 'Address not found'], 404);
        }
        $address->update($request->all());
        return response($address, 200);
    }

    public function deleteAddress($id)
    {
        $address = address::find($id);
        if(is_null($address)){
            return response()->json(['message' => 'Address not found'], 404);
        }
        $address->delete();
        return response()->json(['message' => 'Address deleted'], 200);
    }
}

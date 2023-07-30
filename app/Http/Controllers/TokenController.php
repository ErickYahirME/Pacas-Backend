<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    //función para la validación del token  y el usuario
    public function validateToken(Request $request){
        $request->validate([
            'token' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        //si el token es valido retorna un mensaje de token validado

        return response()->json(['message' => 'Token Validated'], 200);

    }

    public function validateToken2($token){
        $user = User::where('api_token', $token)->first();

        if ($user) {
            // El token es válido y corresponde a un usuario existente
            return true;
        } else {
            // El token no es válido o no está asociado a ningún usuario
            return false;
        }
    }
}

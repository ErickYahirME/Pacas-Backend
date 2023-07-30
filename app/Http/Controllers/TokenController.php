<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class TokenController extends Controller
{

    //función para validar un token valido  de tipo Bearer y regresar un booleano como respuesta
    public function validarToken(Request $request)
    {
        try {
            $token = $request->input('token');
            if (!$token) {
                return response()->json(['valido' => false], 401);
            }

            $user = JWTAuth::parseToken()->check();
            if (!$user) {
                return response()->json(['valido' => false], 401);
            }

            return response()->json(['valido' => true], 200);
        } catch (JWTException $e) {
            return response()->json(['valido' => false], 500);
        }
    }
}

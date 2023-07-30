<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        try {
            //code...
            $validateUser = Validator::make($request->all(),
            [
            'name' =>'required',
            'lastname'=>'required',
            'sex_id' =>'required',
            'role_id'=>'required',
            'phone'=>'required',
            'email' =>'required|email|unique:users,email',
            'password'=>'required',
            ]);

            if($validateUser->fails()) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'validation Error',
                    'errors'=> $validateUser->errors()
                ],401);
            }
            $user = User::create([
                'name'=> $request->name,
                'lastname'=>$request->lastname,
                'sex_id' =>$request->sex_id,
                'role_id'=>$request->role_id,
                'phone'=>$request->phone,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
            ]);

            $token = $user->createToken('TOKEN')->plainTextToken;


            return response()->json([
                'status'=> true,
                'message'=> 'User created successfully',
                'user'=> $user,
                'token'=> $this->respondWithToken($token),
                // 'token_type'=> 'Bearer'
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=> false,
                'message'=> $th->getMessage()
            ],500);
        }

    }

        protected function respondWithToken($token)
    {
        $expiration = JWTAuth::factory()->getTTL() * 60;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration,
        ]);
    }
}

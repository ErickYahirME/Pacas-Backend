<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // public function login(Request $request){
    //     $this->validate($request, [
    //         'email' => 'required|max:255',
    //         'password' => 'required',
    //     ]);

    //     $login = $request-> only('email', 'password');


    //     if(Auth::attempt($login)){

    //         /**
    //      * @var User $user
    //      */
    //     $user = Auth::user();
    //     $token = $user->createToken($user->name);

    //     return response([
    //         'id'=> $user->id,
    //         'name'=> $user->name,
    //         'email'=> $user->email,
    //         'created_at' => $user->created_at,
    //         'updated_at' => $user->updated_at,
    //         'token' => $token->accessToken,
    //         // 'token_expires_at'=> $token->token->expires_at,
    //     ],200);
    //     }

    //     return response(['message' => 'Invalid Login credential!!', 401]);


    // }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message'=>'Unauthorized'],401);
        }

        $user = User::where('email', $request['email'])
                ->addSelect(
                    [
                        'rol' =>role::select('type_role')
                        ->whereColumn('role_id','id')
                    ]
                )
                ->firstOrFail();

        $token = $user->createToken('TOKEN')->plainTextToken;
        $cookie = cookie('cookie_token', $token,60 *24);

        return response()
            ->json([
                'message'=>'Hi',
                'name' => $user->name,
                'access_token' => $token,
                'typeToken' => 'Bearer',
                'user' => $user
            ])->withoutCookie($cookie);
    }


    public function logout(Request $request){

        /**
         * @var user $user
        */
        $user = Auth::user();

        $userToken = $user->tokens();
        $userToken->delete();
        return response(['message'=> 'Logged Out!!'],200);
    }

}

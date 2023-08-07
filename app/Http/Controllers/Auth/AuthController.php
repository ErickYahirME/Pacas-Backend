<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }



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

        $token = JWTAuth::fromUser($user);
        // $token = $user->createToken('TOKEN')->plainTextToken;
        $cookie = cookie('cookie_token', $token,60 *24* 2 );

        return response()
            ->json([
                'message'=>'Hi',
                'name' => $user->name,
                'token'=> $this->respondWithToken($token),
                // 'access_token' => $token,
                // 'typeToken' => 'Bearer',
                'user' => $user
            ])->withoutCookie($cookie);
    }

    public function me()
    {
        return response()->json(auth()->user());
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

       /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::parseToken()->refresh();
        return $this->respondWithToken($token);
    }


        /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
{
    $expiration = JWTAuth::factory()->getTTL() * 60;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => $expiration,
        'expiration_date' => now()->addSeconds($expiration)->toDateTimeString(),
    ]);
}

}

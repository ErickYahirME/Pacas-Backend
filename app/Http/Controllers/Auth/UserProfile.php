<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
    //

    public function userDetails()
    {
        $user = Auth::guard('api')->user();
        return response()->json(['data' => $user]);
    }
}

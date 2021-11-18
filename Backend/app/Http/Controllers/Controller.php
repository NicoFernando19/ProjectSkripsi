<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Carbon\Carbon;

class Controller extends BaseController
{
    public function respondWithToken($token)
    {
        auth()->user()->lastLogin = Carbon::now();
        auth()->user()->save();
        return response()->json([
            'user'=>auth()->user(),
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => time() + 60 * 60 * 60 * 24
        ], 200);
    }

    public function respondWithTokenForEmployee($token)
    {
        return response()->json([
            'user'=>auth('employee')->user(),
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => time() + 60 * 60 * 60 * 24
        ], 200);
    }
}

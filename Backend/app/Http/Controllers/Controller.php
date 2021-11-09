<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function respondWithToken($token)
    {
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

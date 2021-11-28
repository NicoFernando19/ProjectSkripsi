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
        $user = auth()->user();
        $role_user = array();
        foreach ($user->Roles as $role){
            array_push($role_user, $role->role_name);
        }
        $user['companyRoles'] = implode(", ",$role_user);
        $role_user = array();
        return response()->json([
            'user'=> $user,
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

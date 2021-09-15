<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
	
     /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */	 
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (! $token = Auth::attempt($credentials,true)) {			
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

	
     /**
     * Get user details.
     *
     * @param  Request  $request
     * @return Response
     */	 	
    public function me()
    {
        return response()->json(auth()->user());
    }
}
?>
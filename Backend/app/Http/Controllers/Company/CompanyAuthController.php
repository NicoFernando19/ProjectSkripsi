<?php

namespace App\Http\Controllers\Company;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;

class CompanyAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']); 
        if (! $token = auth('company')->attempt($credentials,true)) {			
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return app('App\Http\Controllers\Controller')->respondWithTokenForCompany($token);
    }

    public function me()
    {
        $user = auth('company')->user();
        $user->CompanyType;
        return response()->json($user);
    }
}
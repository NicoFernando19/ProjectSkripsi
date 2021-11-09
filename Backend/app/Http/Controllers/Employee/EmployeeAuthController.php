<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;

class EmployeeAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']); 
        if (! $token = auth('employee')->attempt($credentials,true)) {			
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return app('App\Http\Controllers\Controller')->respondWithTokenForEmployee($token);
    }

    public function me()
    {
        return response()->json(auth('employee')->user());
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Company;
use Tymon\JWTAuth\JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'Register']]);
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
            return response()->json([
                'message' => 'Incorrect Password or Email'
            ], 400);
        }
        return $this->respondWithToken($token);
    }


    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'address' => 'required|string',
            'name' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'state' => 'required|string',
            'email' => 'required|string|email',
            'BidangUsaha' => 'required|string',
            'Industri' => 'required|string',
            'password' => 'required|string|confirmed',
            'company_type_id' => 'required'
        ]);

        if($validator->fails()){
            $err = [
                'errors' => $validator->errors()
            ];
            return response()->json($err, 400);
        }

        $request->password = app('hash')->make($request->password);
        $user = Company::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Create user success'
        ], 201);
    }

	
     /**
     * Get user details.
     *
     * @param  Request  $request
     * @return Response
     */	 	
    public function me()
    {
        $user = auth()->user();
        $role_user = array();
        foreach ($user->Roles as $role){
            array_push($role_user, $role->role_name);
        }
        $user['companyRoles'] = implode(", ",$role_user);
        $role_user = array();
        return response()->json($user);
    }
}
?>
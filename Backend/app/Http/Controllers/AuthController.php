<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyRole;
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
        Auth::user()->update([
            'lastLogin' => Carbon::now()
        ]);
        return $this->respondWithToken($token);
    }


    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required|integer|min:1',
            'username' => 'required|string',
            'address' => 'required|string',
            'name' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'state' => 'required|string',
            'email' => 'required|string|email|unique:companies',
            'Industri' => 'required|string',
            'password' => 'required|string|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'company_type_id' => 'required|integer|min:1'
        ], [
            'role_id.min' => 'Register as is required.',
            'company_type_id.min' => 'Company Type is required.'
        ]);

        if($validator->fails()){
            $err = [
                'errors' => $validator->errors()
            ];
            return response()->json($err, 400);
        }
        $user = Company::create($request->except(['password', 'role_id']));
        $request->password = app('hash')->make($request->password);
        $user->password = $request->password;
        $user->save();

        $companyRole = CompanyRole::create([
            'company_id' => $user->id,
            'role_id' => $request->get('role_id')
        ]);

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
        $user['companyName'] = $user->CompanyType->type_name.' '.$user->name;
        $role_user = array();
        return response()->json($user);
    }
}
?>
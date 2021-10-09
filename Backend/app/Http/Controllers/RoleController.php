<?php

namespace App\Http\Controllers;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function listRole()
    {
        $data = [
            data => Role::all()
        ];

        return response()->json($data, 200);
    }
}
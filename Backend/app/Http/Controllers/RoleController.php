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
            'data' => Role::all()
        ];

        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Role::create($request->all());
            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function showById($id)
    {
        try {
            $data = Role::find($id);
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Role::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Role::find($id);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;

class EmployeeController extends Controller
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

    public function listEmployee(Request $request)
    {
        $data = [
            'data' => Employee::where('name', 'LIKE',"%$request->name%")
                ->paginate($request->perPage)
        ];

        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'DoB' => 'required',
            'phoneNumber' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'about' => 'required|string',
            'jobTitle' => 'required|string',
            'jobDesc' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|file',
            'document' => 'file'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Employee::create($request->except(['image', 'document']));
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->imgName = $fileName;
                $data->save();
            }
            if($request->hasFile('document')) {
                $file2 = $request->file('document');
                $fileName2 = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file2);
                $data->docName = $fileName2;
                $data->save();
            }
            
            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function showById($id)
    {
        try {
            $data = Employee::with(['Company'])->find($id);
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'string',
            'DoB' => 'string',
            'phoneNumber' => 'string',
            'address' => 'string',
            'country' => 'string',
            'city' => 'string',
            'zip' => 'string',
            'about' => 'string',
            'jobTitle' => 'string',
            'jobDesc' => 'string',
            'countryCode' => 'string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|file',
            'document' => 'file'
        ]);
        

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Employee::find($id);
            $data->update($request->except(['image', 'document']));
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->imgName = $fileName;
                $data->save();
            }
            if($request->hasFile('document')) {
                $file2 = $request->file('document');
                $fileName2 = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->docName = $fileName2;
                $data->save();
            }
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Employee::find($id);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}

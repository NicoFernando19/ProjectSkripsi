<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function listCompany(Request $request)
    {
        if (!empty($request->name)) {
            $value = $request->get("name");
            $datas = Company::where('id', '!=', Auth::id())
                        ->where("name", "LIKE", "%$value%")
                        ->get();
        }else {
            $datas = Company::where('id', '!=', Auth::id())->get();
        }
        $data = [
            'data' => $datas
        ];

        return response()->json($data, 200);
    }

    public function create(Request $request)
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
            'company_type_id' => 'required',
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 500);
        }

        try{
            $request->password = app('hash')->make($request->password);
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
            }
            $data = Company::create($request->all());
            if(!is_null($request->password)){
                $request->password = app('hash')->make($request->password);
                $data->password = $request->password;
                $data->imgName = $fileName;
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
            $data = Company::with(['CompanyType', 'Roles', 'WorkHistory'])->find($id);
            $data['companyName'] = $data->CompanyType->type_name.' '.$data->name;
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function update(Request $request, $id)
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
            'password' => 'string|confirmed',
            'company_type_id' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Company::find($id);
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
            }
            $data->update($request->all());
            if(!is_null($request->password)){
                $request->password = app('hash')->make($request->password);
                $data->password = $request->password;
                $data->imgName = $fileName;
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
            $data = Company::find($id);
            app('App\Http\Controllers\DocumentUpload\FileController')->deleteFile($data->imgName);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
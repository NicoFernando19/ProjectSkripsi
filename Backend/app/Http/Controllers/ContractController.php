<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ContractController extends Controller
{

    public function __contruct() 
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        if($request->get('per_page')){
            $perpage=$request->get('per_page');
        }
        foreach(Auth::user()->Roles as $role) {
            if ($role->role_name == 'Business Owner') {
                if (!empty($request->get('company')) || !empty($request->get('vendor'))) {
                    $company = $request->get('company');
                    $vendor = $request->get('vendor');
                    $datas = Contract::with(['Company', 'Vendor'])->where('company_id', Auth::id())->get();
                    $data = $datas->filter( function ($value, $key) use($company, $vendor){  
                        return (str_contains(strtolower($value->company->name), strtolower($company)) && str_contains(strtolower($value->vendor->name) , strtolower($vendor)));
                    });
                    $datas = $data->all();
                    $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, $perpage);
                }else {
                    $datas = Contract::with(['Company', 'Vendor'])->where('company_id', Auth::id())->paginate($perpage);
                }
            } else {
                if (!empty($request->get('company')) || !empty($request->get('vendor'))) {
                    $company = $request->get('company');
                    $vendor = $request->get('vendor');
                    $datas = Contract::with(['Company', 'Vendor'])->where('vendor_id', Auth::id())->get();
                    $data = $datas->filter( function ($value, $key) use($company, $vendor){  
                        return (str_contains(strtolower($value->company->name), strtolower($company)) && str_contains(strtolower($value->vendor->name) , strtolower($vendor)));
                    });
                    $datas = $data->all();
                    $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, $perpage);
                }else {
                    $datas = Contract::with(['Company', 'Vendor'])->where('vendor_id', Auth::id())->paginate($perpage);
                }
            }
        }
        
        $data = [
            'data' => $datas
        ];

        return response()->json($data, 200);
    }

    public function showById($id)
    {
        try {
            $data = Contract::with(['Company', 'Vendor'])->find($id);
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'workforce' => 'required|integer',
            'jobFunction' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Contract::create($request->all());
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->document = $fileName;
                $data->save();
            }

            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'workforce' => 'required|integer',
            'jobFunction' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Contract::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Contract::find($id);
            app('App\Http\Controllers\DocumentUpload\FileController')->deleteFile($data->document);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}

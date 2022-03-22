<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        // $this->middleware('auth:api');
    }

    public function listCompany(Request $request)
    {
        if (!empty($request->name) || $request->get("company_type") != "0") {
            $name = $request->get("name");
            $companyType = $request->get("company_type");
            $datas = Company::with(['Role', 'CompanyType'])
                        ->where('id', '!=', Auth::id())
                        ->where("name", "LIKE", "%$name%")
                        ->get();
            if ($companyType != "0") {
                $data = $datas->filter( function ($value, $key) use($companyType){ 
                    return collect($value)->contains('role_name', $companyType);
                });
                $datas = $data->all();
            }
            foreach ($datas as $key => $user) {
                $user['companyName'] = $user->CompanyType->type_name.' '.$user->name;
            }
            $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, 9);
        }else {
            $datas = Company::with(['Role', 'CompanyType'])->where('id', '!=', Auth::id())->paginate(9);
            foreach ($datas as $key => $user) {
                $user['companyName'] = $user->CompanyType->type_name.' '.$user->name;
            }
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

    public function showById($id, Request $request)
    {
        try {
            $data = Company::with(['CompanyType', 'Role', 'WorkHistory'])->find($id);
            $currentPage = $request->Page;
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });
            $data->setRelation('employees', $data->employees()->paginate($request->perPage));
            $data['roleName'] = $data->Role->role_name;
            foreach($data->WorkHistory as $work) {
                $work['start_date'] = Carbon::parse($work->startDate)->format("d M Y");
                $work['end_date'] = Carbon::parse($work->endDate)->format("d M Y"); 
                if ($work->endDate >= Carbon::now()) {
                    $work['moreThenNow'] = true;
                } else {
                    $work['moreThenNow'] = false;
                }
            }
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
            $data->update($request->except('password'));
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

    public function updateImage(Request $request, $id)
    {
        try{
            $data = Company::find($id);
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
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

    public function getCompContract(){
        try {
            $data = Company::with(['Contract.Company', 'Contract.Vendor'])->where('id', Auth::id())->first();
            return response()->json($data, 200);
        } catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
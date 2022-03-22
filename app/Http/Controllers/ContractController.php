<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use App\Models\Company;
use App\Models\WorkHistory;
use App\Models\CompanyContract;
use Auth;

class ContractController extends Controller
{

    public function __contruct() 
    {
        // $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        if($request->get('per_page')){
            $perpage=$request->get('per_page');
        }
        $datas = Contract::whereHas('Companies', function ($query){
            return $query->where('company_id', Auth::id());
        })->get();
        foreach ($datas as $key => $data) {
            foreach ($data->companies as $key => $company) {
                if ($company->role->role_name == 'Vendor') {
                    $data['vendor'] = $company;
                }else {
                    $data['company'] = $company;
                }
            }
        }
        // $datas->setRelation('Contracts', $datas->contracts()->paginate($perpage));
        // $datas = Contract::with(['Companies'])->paginate($perpage);
        // if (Auth::user()->Role->role_name == 'Business Owner') {
        //     if (!empty($request->get('company')) || !empty($request->get('vendor'))) {
        //         $company = $request->get('company');
        //         $vendor = $request->get('vendor');
        //         $datas = Contract::whereHas('Companies', function ($query){
        //             return $query->where('company_id', Auth::id());
        //         })->get();
        //         $data = $datas->filter( function ($value, $key) use($company, $vendor){  
        //             return (str_contains(strtolower($value->company->name), strtolower($company)) && str_contains(strtolower($value->vendor->name) , strtolower($vendor)));
        //         });
        //         $datas = $data->all();
        //         $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, $perpage);
        //     }else {
        //         $datas = Contract::whereHas('Companies', function ($query){
        //             return $query->where('company_id', Auth::id());
        //         })->paginate($perpage);
        //     }
        // } else {
        //     if (!empty($request->get('company')) || !empty($request->get('vendor'))) {
        //         $company = $request->get('company');
        //         $vendor = $request->get('vendor');
        //         $datas = Contract::with(['Companies'])->where('vendor_id', Auth::id())->get();
        //         $data = $datas->filter( function ($value, $key) use($company, $vendor){  
        //             return (str_contains(strtolower($value->company->name), strtolower($company)) && str_contains(strtolower($value->vendor->name) , strtolower($vendor)));
        //         });
        //         $datas = $data->all();
        //         $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, $perpage);
        //     }else {
        //         $datas = Contract::whereHas('Companies', function ($query){
        //             return $query->where('company_id', Auth::id());
        //         })->paginate($perpage);
        //     }
        // }
        $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, $perpage);
        $data = [
            'data' => $datas
        ];

        return response()->json($data, 200);
    }

    public function showById($id)
    {
        try {
            $data = Contract::with(['Companies'])->find($id);
            foreach ($data->companies as $key => $company) {
                if ($company->role->role_name == 'Vendor') {
                    $data['vendor'] = $company;
                }else {
                    $data['company'] = $company;
                }
            }
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
            // 'workforce' => 'required|integer',
            'jobFunction' => 'required|string'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Contract::create($request->except(['company_id', 'vendor_id']));
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->document = $fileName;
                $data->save();
            }

            $relationCompany = CompanyContract::create([
                'company_id' => $request->company_id,
                'contract_id' => $data->id
            ]);

            $relationVendor = CompanyContract::create([
                'company_id' => $request->vendor_id,
                'contract_id' => $data->id
            ]);

            $company = Company::find($request->company_id);

            $notification = Notification::create([
                'type' => 'Created Contract',
                'company_id' => $request->vendor_id,
                'data' => $company->CompanyType->type_name.' '.$company->name.' has created contract with you',
                'vacancyLink' => '/contract/detail?id='.$data->id
            ]);

            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function updateDocument(Request $request, $id)
    {
        try{
            $data = Contract::find($id);
            if($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = app('App\Http\Controllers\DocumentUpload\FileController')->upload($file);
                $data->document = $fileName;
                $data->save();
            }

            if (Auth::user()->Role->role_name != 'Business Owner') {
                foreach ($data->Companies as $key => $company) {
                    if($company->Role->role_name != 'Business Owner') {
                        $vendorId = $company->id;
                    } else {
                        $companyid = $company->id;
                    }
                }
                $company = Company::find($vendorId);
    
                $notification = Notification::create([
                    'type' => 'Updated Contract',
                    'company_id' => $companyid,
                    'data' => $company->CompanyType->type_name.' '.$company->name.' has been updated contract\'s document',
                    'vacancyLink' => '/contract/detail?id='.$data->id
                ]);
            } else {
                foreach ($data->Companies as $key => $company) {
                    if($company->Role->role_name == 'Business Owner') {
                        $companyId = $company->id;
                    } else {
                        $vendorCompanyId = $company->id;
                    }
                }
                $company = Company::find($companyId);
    
                $notification = Notification::create([
                    'type' => 'Updated Contract',
                    'company_id' => $vendorCompanyId,
                    'data' => $company->CompanyType->type_name.' '.$company->name.' has been updated contract\'s document',
                    'vacancyLink' => '/contract/detail?id='.$data->id
                ]);
            }
            

            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            // 'workforce' => 'required|integer',
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
            $data->update($request->except(['company_id', 'vendor_id']));

            if (Auth::user()->Role->role_name == 'Business Owner') {
                foreach ($data->Companies as $key => $company) {
                    if($company->Role->role_name != 'Business Owner') {
                        $vendorId = $company->id;
                    } else {
                        $companyid = $company->id;
                    }
                }
                $company = Company::find($companyid);
    
                $notification = Notification::create([
                    'type' => 'Updated Contract',
                    'company_id' => $vendorId,
                    'data' => $company->CompanyType->type_name.' '.$company->name.' has been updated the contract',
                    'vacancyLink' => '/contract/edit?id='.$data->id
                ]);
            } else {
                foreach ($data->Companies as $key => $company) {
                    if($company->Role->role_name != 'Business Owner') {
                        $vendorId = $company->id;
                    } else {
                        $companyid = $company->id;
                    }
                }
                $company = Company::find($vendorId);
                if ($request->get('status') == 'Revise') {
                    $notification = Notification::create([
                        'type' => 'Updated Contract',
                        'company_id' => $companyid,
                        'data' => $company->CompanyType->type_name.' '.$company->name.' has request to revise the contract',
                        'vacancyLink' => '/contract/edit?id='.$data->id
                    ]);
                } else {
                    $notification = Notification::create([
                        'type' => 'Updated Contract',
                        'company_id' => $data->companyid,
                        'data' => $company->CompanyType->type_name.' '.$company->name.' has approved the contract',
                        'vacancyLink' => '/contract/detail?id='.$data->id
                    ]);

                    $comp = Company::find($data->company_id);

                    $workHistory = WorkHistory::create([
                        'company_id' => $vendorId,
                        'Title' => 'Work with '.$comp->CompanyType->type_name.' '.$comp->name,
                        'startDate' => $request->startDate,
                        'endDate' => $request->endDate
                    ]);
                }
    
            }

            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string'
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

            if (Auth::user()->Role->role_name != 'Business Owner') {
                $company = Company::find($data->vendor_id);
    
                $notification = Notification::create([
                    'type' => 'Updated Contract',
                    'company_id' => $data->company_id,
                    'data' => $company->CompanyType->type_name.' '.$company->name.' has rejected the contract',
                    'vacancyLink' => '/contract/list'
                ]);
            } else {
                $company = Company::find($data->company_id);
    
                $notification = Notification::create([
                    'type' => 'Updated Contract',
                    'company_id' => $data->vendor_id,
                    'data' => $company->CompanyType->type_name.' '.$company->name.' has cancelled the contract',
                    'vacancyLink' => '/contract/list'
                ]);
            }

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

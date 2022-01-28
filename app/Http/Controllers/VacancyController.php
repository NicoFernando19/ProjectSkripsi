<?php

namespace App\Http\Controllers;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\JoinedCompany;
use App\Models\Notification;
use App\Models\CompanyInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
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

    public function listVacancy(Request $request)
    {
        foreach(Auth::user()->Roles as $role) {
            if ($role->role_name == 'Business Owner') {
                if (!empty($request->title) || !empty($request->company)) {
                    $title = $request->get("title");
                    $company = $request->get("company");
                    $datas = Vacancy::with('company')->where('company_id', Auth::id())->get();
                    $data = $datas->filter( function ($value, $key) use($title, $company){  
                        return (str_contains(strtolower($value->Title), strtolower($title)) && str_contains(strtolower($value->company->name) , strtolower($company)));
                    });
                    $datas = $data->all();
                    $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, 9);
                } else {
                    $datas = Vacancy::with('company')->where('company_id', Auth::id())->paginate(9);
                }
            }
            else {
                if (!empty($request->title) || !empty($request->company)) {
                    $title = $request->get("title");
                    $company = $request->get("company");
                    $datas = Vacancy::with('company')->where('isActive', true)->get();
                    $data = $datas->filter( function ($value, $key) use($title, $company){  
                        return (str_contains(strtolower($value->Title), strtolower($title)) && str_contains(strtolower($value->company->name) , strtolower($company)));
                    });
                    $datas = $data->all();
                    $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, 9);
                } else {
                    $datas = Vacancy::with(['company', 'CompanyInterest'])->where('isActive', true)->get();
                    $compInterest = CompanyInterest::where('company_id', Auth::id())->get();
                    foreach ($compInterest as $comp) {
                        $vacancies = JoinedCompany::where('company_interest_id', $comp->id)->get();
                        foreach ($datas as $key => $data) {
                            foreach ($vacancies as $vacancy) {
                                if ($vacancy->vacancy_id == $data->id) {
                                    $data['status'] = 'Applied';
                                }
                            }
                        }
                    }
                    $datas = app('App\Http\Controllers\PaginationController')->paginate($datas, 9);
                }
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
            'Title' => 'required|string',
            'jobType' => 'required|string',
            'jobDesc' => 'required|string',
            'Requirement' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Vacancy::create($request->all());
            $data->company_id = Auth::id();
            $data->save();
            return response()->json($data, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function showById($id)
    {
        try {
            $data = Vacancy::with(['CompanyInterest', 'Company'])->find($id);
            foreach ($data->CompanyInterest as $key => $company) {
                $company['company'] = $company->Company;
                if ($company->company_id == Auth::id()) {
                    $data['status'] = 'Applied';
                }
            }
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }

    public function getCompanyDetailFromVacancyId(Request $request, $id)
    {
        try {
            $data = Vacancy::with(['CompanyInterest' => function($comp) use ($request) {
                $comp->with('Document');
                $comp->where('company_id', $request->company_id);
            }])->with(['Company'])->find($id);
            return response()->json($data, 200);
        } catch (Exception $err) {
            return response()->json($err, 500);
        }
    }


    public function updateVacancyStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'isActive' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Vacancy::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }

    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Title' => 'required|string',
            'jobType' => 'required|string',
            'jobDesc' => 'required|string',
            'Requirement' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $data = Vacancy::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Vacancy::find($id);
            $data->delete();
            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }

    public function rejectCompany($id, $compId)
    {
        try{
            $data = Vacancy::with(['CompanyInterest' => function($comp) use ($compId) {
                $comp->where('company_id', $compId)->delete();
            }])->find($id);
            $data->save();

            $notification = Notification::create([
                'type' => 'Rejected',
                'company_id' => $compId,
                'data' => 'Your application has been rejected',
                'vacancyLink' => '/vacancy/vendorDetail?id='.$data->id
            ]);

            return response()->json(['success' => 'data has been deleted'], 200);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
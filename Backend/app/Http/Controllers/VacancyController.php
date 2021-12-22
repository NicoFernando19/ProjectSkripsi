<?php

namespace App\Http\Controllers;
use App\Models\Vacancy;
use App\Models\Company;
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
        $this->middleware('auth:api');
    }

    public function listVacancy(Request $request)
    {
        if (!empty($request->title) || !empty($request->company)) {
            $title = $request->get("title");
            $company = $request->get("company");
            $datas = Vacancy::with('company')->get();
            $data = $datas->filter( function ($value, $key) use($title, $company){  
                return (str_contains(strtolower($value->Title), strtolower($title)) && str_contains(strtolower($value->company->name) , strtolower($company)));
            });
            $datas = $data->all();
        } else {
            $datas = Vacancy::with('company')->get();
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
            }
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
}
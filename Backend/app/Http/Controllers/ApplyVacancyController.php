<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Vacancy;
use App\Models\CompanyInterest;
use App\Models\JoinedCompany;
use App\Models\Notification;

class ApplyVacancyController extends Controller
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

    public function joined(Request $request, $vacancyid) { //id punya vacancy
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string',
            'specification' => 'required'
        ]);

        if ($validator->fails()) {
            $return = [
                'error' => $validator->errors()
            ];
            return response()->json($return, 400);
        }

        try{
            $companyInterest = CompanyInterest::create($request->all());
            $companyInterest->company_id = Auth::id();
            $companyInterest->save();

            $joinedCompany = JoinedCompany::create([
                'vacancy_id' => $vacancyid,
                'company_interest_id' => $companyInterest->id
            ]);

            $vacancy = Vacancy::find($vacancyid);

            $notification = Notification::create([
                'type' => 'Applied',
                'company_id' => $vacancy->company->id,
                'data' => 'One company has been applied to your job vacancy'
            ]);

            $result = [
                'success' => 'Data successfully added!',
                'redirect' => '/vacancy/upload?id='.$companyInterest->id,
            ];

            return response()->json($result, 201);
        }catch (Exception $error) {
            return response()->json($error, 500);
        }
    }
}
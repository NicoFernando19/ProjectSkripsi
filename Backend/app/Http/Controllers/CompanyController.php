<?php

namespace App\Http\Controllers;
use App\Models\Company;

class CompanyController extends Controller
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

    public function listCompany()
    {
        $data = [
            'data' => Company::all()
        ];

        return response()->json($data, 200);
    }
}
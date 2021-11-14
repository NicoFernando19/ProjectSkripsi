<?php

namespace App\Http\Controllers;
use App\Models\CompanyType;

class CompanyTypeController extends Controller
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

    public function listCompanyType()
    {
        $data = [
            'data' => CompanyType::all()
        ];

        return response()->json($data, 200);
    }
}
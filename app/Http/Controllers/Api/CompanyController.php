<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() 
    {
        $compaines = Company::all();
        return response()->json($compaines, 200);
    }

    
}

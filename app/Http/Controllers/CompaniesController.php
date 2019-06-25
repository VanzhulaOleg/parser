<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Routing\Controller;

class CompaniesController extends Controller
{
    public function show($companyId)
    {
        $companyInfo = Company::where('company_id', $companyId)->first();
        return view('companies.show', compact('companyInfo'));
    }
}

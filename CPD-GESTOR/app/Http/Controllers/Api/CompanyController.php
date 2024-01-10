<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function funcionarios(Company $company)
    {
        $funcionarios = $company->pessoas()->with('funcionario')->has('funcionario')->get();

        return response()->json($funcionarios);
    }
}

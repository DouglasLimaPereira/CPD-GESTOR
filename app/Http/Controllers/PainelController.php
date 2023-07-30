<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    public function index()
    {
        // $construtoras_total = Company::count();
        // $admins_total = User::where('superadmin', true)->count();
        
        return view('painel.index');
    }
}

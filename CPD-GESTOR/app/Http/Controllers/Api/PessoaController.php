<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function getEmail($company_id, $id)
    {
        session()->put('company_id', $company_id);
        
        try {
            return Pessoa::find($id)->email;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            
            if(!Auth::user()->funcionario->situacao_admissional)
            {
                Auth::logout();
                return back()->withErrors('Acesso indisponível.');
            }

            if((!Auth::user()->funcionario->situacao_admissional) && (!Auth::user()->funcionario->superadmin)) {
                Auth::logout();
                return back()->withErrors('Você não tem acesso a essa área.');
            }

            Session::put('user', Auth::user());
            $filial = auth()->user()->filiais()->first();
            Session::put('filial', $filial);
            
            return redirect()->route('painel.index');
        }
        
        return back()->withErrors([
            'email' => 'Verifique os dados informados.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function cadastro(){
        return view('authentication.cadastro');
    }

    public function cadastroStore(){
        return view('authentication.cadastro');
    }

    public function changeCompany()
    {
        $user = Auth::user();

        return view('authentication.company.index', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetaSenhaController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        if(User::where('email', $request->email)->where('superadmin', false)->first())
            return back()->withErrors('Dados não encontrados');

        $status = Password::sendResetLink(
            $request->only('email')
            
        );
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Você receberá um e-mail com as informações necessárias para a recuperação de senha.')
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetView(Request $request)
    {

        $email = $request->email;
        $token = $request->token;
        
        return view('authentication.resetar-senha.reseta-senha', compact('email', 'token'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            //'password' => 'required|min:8|confirmed',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', 'Senha atualizada com sucesso.')
                    : back()->withErrors(['email' => [__($status)]]);
    }


}

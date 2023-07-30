<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Canteiro;
use App\Models\Company;
use App\Models\Companyuser;
use App\Models\Pessoa;
use App\Models\User;
use App\Notifications\UsuarioCadastroNotification;
use App\Notifications\UsuarioCadastroNovoVinculoNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index(Company $company)
    {
        // $rows = $company->users()->where('superadmin', true)->paginate(10);
        $rows = companyuser::where('superadmin', true)->where('company_id', $company->id)->paginate(10);
        return view('usuarios.index', compact('company', 'rows'));
        
    }

    public function show(Company $company, User $usuario)
    {
        return view('usuarios.show', compact('usuario', 'company'));
    }

    public function create(Company $company)
    {   
        $pessoas = Pessoa::where('user_id', null)->orderBy('nome')->get();

        return view('usuarios.create', compact('company', 'pessoas'));
    }

    public function store(Company $company, Companyuser $companyuser, UsuarioRequest $request)
    {
        // dd($request->all());
        
        $is_user = false;
        $usuario = null;
        
        DB::beginTransaction();
            
        try {
            //Registrando na tabela de usuários
            try{
                //Verificando se o email informado já está cadastrado na tabela de usuários
                if(!$usuario = User::firstWhere('email', $request->email))
                    $usuario = User::create($request->all());
                    $usuario->update(['superadmin'=>false]);
                
            }catch(\Exception $e) {
                // return back()->with('error', $e->getMessage());
                return back()->withErrors('Error 000011: Erro ao tentar salvar o usuário.');
            }

            //Registrando na tabela pessoas
            try{
                $pessoa = $company->pessoas()->firstWhere('email', $usuario->email);
                if(!$pessoa){
                    // dd($request->all());
                    $pessoa = $company->pessoas()->create($request->all());
                }
                $pessoa->update(['user_id' => $usuario->id]);

            }catch(\Exception $e){
                dd($e->getMessage());
                return back()->withErrors('Error 000012: Erro ao tentar salvar a pessoa.');
            }
            
            //Realizando o vínculo entre construtora e usuário
            // if($aa = !(Companyuser::where('company_id', $company->id)->where('user_id', $usuario->id)->where('pessoa_id', $pessoa->id)->first())){
                
                $canteiros = Canteiro::where('company_id', $company->id)->get();
                
                if ($canteiros->count() > 0) {
                    foreach ($canteiros as $key => $canteiro) {

                        if(isset($request->imagem) && $request->imagem)
                        {
                            //Verificando se o arquivo é válido como imagem
                            if($request->imagem->isValid()){    
                                //Cadastrando a nova imagem
                                
                                $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
                                $imagem = $request->imagem->storeAs('companies/' . base64_encode($company->id) . '/canteiros/'.base64_encode(session()->get('canteiro_id')).'/usuarios/images', $imagem_nome, 'public');

                                $compania = $company->companyusers()->create([
                                    'pessoa_id' => $pessoa->id,
                                    'user_id' => $usuario->id,
                                    'superadmin' => 1,
                                    'imagem' => $imagem,
                                    'imagem_origem' => 'g',
                                    'canteiro_id' => $canteiro->id,
                                ]);
                                
                                $usuario->update(['imagem'=>$imagem]);
                            }

                        } else {
                            $compania = $company->companyusers()->create([
                                'pessoa_id' => $pessoa->id,
                                'user_id' => $usuario->id,
                                'superadmin' => 1,
                                'canteiro_id' => $canteiro->id,
                            ]);
                        }
                    }
                } else{
                    if(isset($request->imagem) && $request->imagem)
                    {
                        //Verificando se o arquivo é válido como imagem
                        if($request->imagem->isValid()){    
                            //Cadastrando a nova imagem
                            
                            $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
                            $imagem = $request->imagem->storeAs('companies/' . base64_encode($company->id) . '/canteiros/'.base64_encode(session()->get('canteiro_id')).'/usuarios/images', $imagem_nome, 'public');

                            $compania = $company->companyusers()->create([
                                'pessoa_id' => $pessoa->id,
                                'user_id' => $usuario->id,
                                'superadmin' => 1,
                                'imagem' => $imagem,
                                'imagem_origem' => 'g',
                            ]);
                            
                            $usuario->update(['imagem'=>$imagem]);
                        }

                    } else {
                        $compania = $company->companyusers()->create([
                            'pessoa_id' => $pessoa->id,
                            'user_id' => $usuario->id,
                            'superadmin' => 1,
                        ]);
                    }
                }
            // }else{
            //     return back()->with('warning', 'O email informado já está sendo utilizado.');
            // }
            // dd('teste');
            DB::commit();

            /**
             * Este recurso ocorre após os registros dos dados no banco. Caso dê erro o processo de 
             * cadastro já o foi realizado
             */
            // dd($request->all());
            if (isset($request->enviar_email)) {
                try {
                    $this->sendNotification($pessoa, $usuario, $request->senha, $is_user);
                } catch (\Throwable $th) {
                    //return back()->withErrors($th->getMessage());
                    return back()->withErrors('Error 000015: Dados registrados com sucesso! Contudo o Email de confirmação de cadastro não pode ser enviado.');
                }
            }
            
            return redirect()->route('construtoras.usuarios.index', $company->id)->with('success', 'Usuário cadastrado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error 000014: Erro ao tentar realizar o cadastro do usuário.');
        }
    }

    public function edit(Company $company, User $usuario)
    {
        $companyuser = $usuario->pessoa->companyuser;
        // dd($companyuser->pessoa->telefone);
        
        //if($usuario->$company->id != $company->id) return back()->with(['warning'=>'Recurso não encontrado']);
        return view('usuarios.edit', compact('company', 'usuario', 'companyuser'));
    }

    public function update(Company $company, User $usuario, UsuarioRequest $request)
    {
        // $pessoa = Pessoa::all();
        //Processo de atualização do usuário
        // 1 - Atualiza os dados na tabela de usuário [email; name]
        try {
            //Checa se o email informado já existe
            if(User::where('id', '!=', $usuario->id)->where('email', $request->email)->first())
                return back()->withErrors('O Email informado já está cadastrado');

            DB::beginTransaction();
            
            // ATUALIZANDO OS DADOS DA TABELA USERS
            
            if($request->senha != '')
            {
                $usuario->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->senha),
                ]);

            }else{
                $usuario->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }

            // ATUALIZANDO NOME DA TABELA PESSOA
            $pessoa = Pessoa::firstWhere('user_id', $usuario->id);
            $pessoa->update([
                'nome' => $request->name,
                'engenharia' => $request->engenharia,
                'seguranca' => $request->seguranca,
            ]);

            $companyuser = $usuario->companies;
            
                $imagem = $companyuser->imagem;
                // $canteiro->update($request->all());
                
                //Processo de atualização de imagem
                if(isset($request->imagem) && $request->imagem)
                {
                    //Deletando o arquivo caso já exista algum
                    if(Storage::disk('public')->exists($imagem))
                        Storage::disk('public')->delete($imagem);

                    //Verificando se o arquivo é válido como imagem
                    if($request->imagem->isValid()){    
                        //Cadastrando a nova imagem
                        $imagem_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->imagem->getClientOriginalExtension();
                        $imagem = $request->imagem->storeAs('companies/' . base64_encode($companyuser->company_id) . '/usuarios/images', $imagem_nome, 'public');

                        //Atualiza o campo imagem
                        $companyuser->update([
                            'imagem' => $imagem,
                            'imagem_origem' => 'g'
                        ]);
                    }
                }
            
            DB::commit();
            
            return redirect()->route('construtoras.usuarios.index', $company->id)->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors($th->getMessage());
            return back()->with('error', 'Atualização não realizada!');
        }
    }

    public function destroy(Company $company, User $usuario)
    {
        // REMOVENDO REGISTRO DA TABELA COMPANYUSER        
        try {
            $usuario->pessoa->companyuser()->update(['active' => false]);
            $usuario->pessoa->companyuser()->delete();
            return back()->with('success', 'Usuário removido com sucesso.');
        } catch (\Exception $th) {
            return back()->withErrors($th->getMessage());
            return back()->with('error', 'Não foi possível remover este usuário.');
        }
    }

    public function checaEmailExistenteUsuario($email)
    {
        return User::firstWhere('email', $email);
    }

    public function sendNotification($pessoa, $usuario, $senha, $is_user)
    {
        if(!$is_user){
            Notification::route('mail', $usuario->email)
            ->notify(new UsuarioCadastroNotification($pessoa, $usuario, $senha));
        }else{
            Notification::route('mail', $usuario->email)
            ->notify(new UsuarioCadastroNovoVinculoNotification($pessoa, $usuario, $senha));
        }
    }
}
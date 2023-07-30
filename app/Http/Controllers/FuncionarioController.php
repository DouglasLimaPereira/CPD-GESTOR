<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\FuncionarioRequest;
use App\Models\Companyuser;
use App\Models\Funcionario;
use App\Models\Pessoa;
use App\Models\Funcao;
use App\Models\User;
use App\Notifications\UsuarioCadastroNotification;
use App\Notifications\UsuarioCadastroNovoVinculoNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class FuncionarioController extends Controller
{
    public function index(Company $company)
    {
        $pessoas = Pessoa::has('funcionario')->orderby('nome')->where('company_id', $company->id)->paginate(10);

        return view('funcionarios.index', compact('company', 'pessoas'));
    }

    public function create(Company $company)
    {
        $funcoes = Funcao::all();
        
        return view('funcionarios.create', compact('company', 'funcoes'));
    }

    public function store(Company $company, FuncionarioRequest $request)
    {
        $input = $request->all();
        
        //Valida email
        if($company->pessoas->firstWhere('email', $input['email'])){
            return back()->withInput()->withErrors('O email informado já está sendo utilizado.');
        }

        //Valida matrícula
        if($company->funcionarios->firstWhere('matricula', $input['matricula'])){
            return back()->withInput()->withErrors('A matrícula informada já está sendo utilizada.');
        }
        
        try {
            DB::beginTransaction();

            //Registrando na tabela pessoa
            try {
                $pessoa = $company->pessoas()->create($input); 
            } catch (\Throwable $th) {
                //return back()->withErrors($e->getMessage());
                return back()->with('Erro 000101PES', 'Erro ao tentar realizar o cadastro.');
            }
            
            //Registrando na tabela funcionario
            try {
                $funcionario = $pessoa->funcionario()->create($input);
                
            } catch (\Throwable $th) {
                //return back()->withErrors($e->getMessage());
                return back()->with('Erro 000102FUN', 'Erro ao tentar realizar o cadastro.');
            }
            
            //Registrando a Função
            try {
                $funcionario->funcoes()->create($input);
            } catch (\Throwable $th) {
                //throw $th;
            }

            //Registrando na tabela de usuários
            $is_user = false;
            $usuario = null;
            if(isset($input['cadastrar_como_usuario'])){
                try {
                    if(!$usuario = User::firstWhere('email', $input['email'])){
                        $usuario = User::create($input);
                        $pessoa->update(['user_id' => $usuario->id]);
                    }else{
                        $is_user = true;
                        $pessoa->update(['user_id' => $usuario->id]);
                    }
                } catch (\Exception $e) {
                    //return back()->withErrors($e->getMessage());
                    return back()->with('Erro 000103USU', 'Erro ao tentar realizar o cadastro.');
                }
                
                //Realizando o vínculo entre companhia e usuário
                try {
                    $company->companyusers()->create([
                        'pessoa_id' => $pessoa->id,
                        'user_id' => $usuario->id
                    ]);
                } catch (\Throwable $th) {
                    //return back()->withErrors($e->getMessage());
                    return back()->with('Erro 000104COMP_USU', 'Erro ao tentar realizar o cadastro.');
                }
            }
            DB::commit();

            //Enviando o e-mail
            try {
                $this->sendNotification($pessoa, $usuario, $request->senha, $is_user);
            } catch (\Throwable $th) {
                return redirect()->route('construtoras.funcionarios.index', $company->id)->with('warning', 'Cadastro realizado com sucesso. Contudo o email não pode ser enviado');
            }

            return redirect()->route('construtoras.funcionarios.index', $company->id)->with('success', 'Registro realizado com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->withErrors($e->getMessage());
            return back()->with('error', 'Cadastro não realizado.');
        }
    }

    public function edit(Company $company, Funcionario $funcionario)
    {
        
        if(!$this->validaRelacionamento($company, $funcionario)) return back()->with(['warning'=>'Recurso não encontrado']);
        
        $funcoes = Funcao::all();
        $pessoa = Pessoa::all();
        $usuario = User::all();

        // Verificando se o Usuário tem acesso ao sistema
        $acesso_sistema = false;
        if (($funcionario->pessoa->user_id))
        {
            // Verificando se o usuário foi deletado ou não 
            if(Companyuser::where('company_id', $funcionario->company_id)->where('pessoa_id', $funcionario->pessoa_id)->where('user_id', $funcionario->pessoa->user_id)->first())  $acesso_sistema = true;
        }
        
        return view('funcionarios.edit', compact('company', 'funcionario', 'acesso_sistema', 'funcoes', 'usuario'));
    }

    public function update(Company $company, Funcionario $funcionario, FuncionarioRequest $request)
    {
        if(!$this->validaRelacionamento($company, $funcionario)) return back()->with(['warning'=>'Recurso não encontrado']);

        $input = $request->all();
        $input['company_id'] = $company->id;
        
        //Valida email
        if($company->pessoas->where('id', '!=', $funcionario->pessoa_id)->where('email', $request->email)->count() > 0) 
            return back()->withInput()->withErrors('O email informado já está sendo utilizado....');
        
        //Valida matrícula
        if($company->funcionarios->where('id', '!=', $funcionario->id)->where('matricula', $request->matricula)->count() > 0) 
            return back()->withInput()->withErrors('A matrícula informada já está sendo utilizada....');
        
        try {
            DB::beginTransaction();
            //dd($input);
            //Atualizando o registro na tabela pessoa
            $pessoa = $funcionario->pessoa->update( $request->only('nome', 'email'));
           
            //Atualizando o Registro na tabela Funcionários
            $funcionario->update($request->all());

            // Atualizando função do funcionário  
            $funcaoAtual = null;
            
            if ($funcao = $funcionario->funcoes()->firstWhere('active', 1)) { 
                
                $funcaoAtual = $funcao->funcao_id;
                
            }

            // Verificando se Função do Funcionário é igual a Recebida do formulario
            try {
                if(!$funcaoAtual) {
                    $funcionario->funcoes()->creates($request->all());
                }else{
                    if($funcaoAtual != $request->funcao_id)
                    {
                        //Inativa as funções que estiverem ativas
                    foreach ($funcionario->funcoes as $key => $value):
                        $value->update(['active' => false]);
                    endforeach;
                    //Adiciona a nova função ao funcionário
                    $funcionario->funcoes()->create($request->all());
                    }
                }
                
            } catch (\Throwable $th) {
                return back()->with('error', 'Erro Função não pode ser atualizada.');
            }

            try {
                //Bloqueia o acesso ao sistema
            if(isset($request->bloquear_acesso))
            {
                $companyuser = Companyuser::where('company_id', $funcionario->company_id)->where('pessoa_id', $funcionario->pessoa_id)->first();
                //Deleta o registro
                
                $companyuser->delete();
            }    
            } catch (\Throwable $th) {
                return back()->with('error', 'Erro ao Desativar Funcionário.');
            }
 
            if(isset($request->cadastrar_como_usuario))
            { 
                    //Verifica se existe um vínculo desativado
                if($func = $company->users()->where('pessoa_id', $funcionario->pessoa_id)->onlyTrashed()->first())
                {
                        //Reativa o vinculo
                        $func->restore();
                    }
                    
                    else
                    {
                        //Não existindo o vínculo cria-se registro para o vínculo
                    
                        if($usuario = User::where('email', $funcionario->pessoa->email))
{  
                            if($usuario != $request->email){
                                $usuario = User::create($request->all());
                                $funcionario->pessoa->update(['user_id' => $usuario->id]);
                            }else{
                                $is_user = true;
                                $pessoa->update(['user_id' => $usuario->id]);
                            }
                        }
                        // dd($funcionario);
                        // //Realizando o vínculo entre companhia e usuário
                    Companyuser::create([
                        'company_id' => $company->id, 
                        
                        'user_id' => $usuario->id, 
                        
                        'pessoa_id' => $funcionario->pessoa->id,
                        
                        'superadmin' => $request->superadmin, 
                        
                        'active' => $request->situacao_admissional,

                        ]);
                     }
            }
            
            DB::commit();

            //return back()->with('success', 'Funcionário atualizado com sucesso.');
            return redirect()->route('construtoras.funcionarios.index', $company->id)->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'O registro não pode ser atualizado.');
        }
    }

    public function destroy(Company $company, Funcionario $funcionario)
    {
        try {
            $funcionario->delete();
            return back()->with('success', 'Funcionário removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Não foi possível remover este registro.');
        }
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

    private function validaRelacionamento($company, $funcionario)
    {
        if($funcionario->pessoa->company_id != $company->id) return false;

        return true;
    }
}
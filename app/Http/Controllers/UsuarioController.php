<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Funcao;
use App\Models\Filial;
use App\Notifications\UsuarioCadastroNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Recursos\Anexo;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(Anexo $anexo)
    {
        $this->anexo = $anexo;
    }

    public function perfil()
    {
        $usuario = User::firstWhere('id', auth()->user()->id);
        $cargos = Funcao::all();
        $filial = session()->get('filial');
        $filiais = Filial::all();
        return view('usuarios.perfil', compact('usuario', 'filial', 'filiais', 'cargos'));
    }

    public function index()
    {
        $usuarios = session()->get('filial')->usuarios()->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }


    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function creat()
    {
        $filiais = Filial::all();
        $cargos = Funcao::all();
        return view('usuarios.create', compact('cargos', 'filiais'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
            //Registrando na tabela de usuários
            try{
                //Verificando se o email informado já está cadastrado na tabela de usuários
                if(!$usuario = User::firstWhere('email', $request->email))
                $usuario = User::create([
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
                
            }catch(\Exception $e) {
                return back()->with('error', $e->getMessage());
                return back()->withErrors('Error 000011: Erro ao tentar salvar o usuário.');
            }
            
            #Registrando na tabela funcionarios
            try{
                $funcionario = $usuario->funcionario()->firstWhere('user_id', $usuario->id);
                if(!$funcionario){
                    $funcionario = $usuario->funcionario()->create([
                        'user_id' => $usuario->id,
                        'funcao_id' => $request->cargo,
                        'nome' => $request->nome,
                        'telefone' => $request->telefone,
                        'matricula' => $request->matricula,
                        'data_admissao' => $request->data_admissao,
                        'situacao_admissional' => 1,
                        'superadmin' => $request->superadmin,
                    ]);
                }
                
            }catch(\Exception $e){
                dd($e->getMessage());
                return back()->withErrors('Error 000012: Erro ao tentar salvar Funcionário.');
            }
            
            //Realizando o vínculo entre Filial e usuário
            if(!($usuario->filiais()->where('filial_id', session()->get('filial')->id)->where('user_id', $usuario->id)->first())){
                
                if ($filiais = $usuario->filiais()->count() > 0) {
                    foreach ($filiais as $key => $filial) {
                        $filial_user = $usuario->filiais()->create([
                            'user_id' => $usuario->id,
                            'superadmin' => 0,
                            'filial_id' => $filial->id,
                        ]);
                    }
                } else{
                    $filial_user = $usuario->filiais()->attach($request->filial, ['superadmin'=>$request['superadmin']]);
                }
            }
            
            DB::commit();
            
            return redirect()->back()->with('success', 'Usuário cadastrado com sucesso');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error 000014: Erro ao tentar realizar o cadastro do usuário.');
        }
    }
    
    public function edit(User $usuario)
    {
        $filiais = Filial::all();
        $cargos = Funcao::all();
        return view('usuarios.edit', compact('filiais', 'cargos', 'usuario'));
    }

    public function update(User $usuario, UsuarioRequest $request)
    {
        //Processo de atualização do usuário
        // 1 - Atualiza os dados na tabela de usuário [email; name]
        try {
            //Checa se o email informado já existe
            if(User::where('id', '!=', $usuario->id)->where('email', $request->email)->first())
                return back()->with('info', 'O Email informado já está cadastrado');
    
            DB::beginTransaction();
    
            // ATUALIZANDO OS DADOS DA TABELA USERS
    
            if ($request->password != '')
            {
                $usuario->update([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
    
                $usuario->funcionario->update([
                    'user_id' => $usuario->id,
                    'funcao_id' => $request->cargo,
                    'matricula' => $request->matricula,
                    'nome' => $request->name,
                    'telefone' => $request->telefone,
                    'cargo' => $request->cargo,
                    'situacao_admissional' => $request->active,
                ]);
    
            } else{
                $usuario->update([
                    'email' => $request->email,
                ]);
    
                $usuario->funcionario->update([
                    'user_id' => $usuario->id,
                    'funcao_id' => $request->cargo,
                    'matricula' => $request->matricula,
                    'nome' => $request->name,
                    'telefone' => $request->telefone,
                    'cargo' => $request->cargo,
                    'situacao_admissional' => $request->active,
                ]);
            }
    
            if(isset($request->imagem) && $request->imagem->isValid()){
                $imagem = $this->anexo->user_store(auth()->user()->id, $request->imagem, $usuario->funcionario->imagem);
                $usuario->funcionario->update([
                    'imagem' => $imagem,
                ]);
            }
    
            DB::commit();
    
            return redirect()->route('usuario.perfil', $usuario->id)->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            // return back()->withErrors($th->getMessage());
            return back()->with('error', 'Erro ao Atualizar dados!');
        }
    }

    public function destroy(User $usuario)
    {
        // REMOVENDO REGISTRO DA TABELA FILIAL_USER, USER E INATIVANDO DA TABELA FUNCIONARIOS
        try {
            $usuario->funcionario()->update(['situacao_admissional' => false]);
            $usuario->filiais()->detach();
            $usuario->delete();
            return back()->with('success', 'Usuário removido com sucesso.');
        } catch (\Exception $th) {
            return back()->withErrors($th->getMessage());
            return back()->with('error', 'Não foi possível remover este usuário.');
        }
    }
}

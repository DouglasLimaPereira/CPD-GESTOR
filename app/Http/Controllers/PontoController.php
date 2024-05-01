<?php

namespace App\Http\Controllers;

use App\Exports\PontosExport;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Ponto;
use Illuminate\Support\Facades\DB;
use App\Recursos\Anexo;
use App\Recursos\HoraExtra;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use DateTime\DateTime;
use Exception;
use Pdf;
use Maatwebsite\Excel\Facades\Excel;

class PontoController extends Controller
{

    private $anexo;
    private $hora_extra;

    public function __construct(Anexo $anexo, HoraExtra $hora_extra)
    {
        $this->anexo = $anexo;
        $this->hora_extra = $hora_extra;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionario = auth()->user()->funcionario;
        // dd($funcionario);
        $pontos = $funcionario->pontos()->orderBy('data', 'desc')->paginate(15);
        // ->orderBy('data', 'desc')->paginate(15);
        // dd($pontos);
        $horas = $this->HoraExtra();
        // dd($pontos);
        return view('ponto.index', compact('pontos', 'funcionario', 'horas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ponto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $dados = $request->all();

            $dados['funcionario_id'] = auth()->user()->funcionario->id;
            $dados['filial_id'] = session('filial')->id;
            // dd($dados['funcionario_id']);
            if (Ponto::where('data', $request['data'])->where('funcionario_id', $dados['funcionario_id'])->first()) {
                return redirect()->back()->withInput()->with('info', 'Já existe Ponto cadastrado para este dia');
            }

            $ponto = Ponto::create($dados);

            if(isset($request->comprovante1) && $request->comprovante1->isValid()){
                $comprovante1 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante1, $ponto->comprovante1);
                $ponto->update([
                    'comprovante1' => $comprovante1,
                ]);
            }

            if(isset($request->comprovante2) && $request->comprovante2->isValid()){
                $comprovante2 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante2, $ponto->comprovante2);
                $ponto->update([
                    'comprovante2' => $comprovante2,
                ]);
            }

            if(isset($request->comprovante3) && $request->comprovante3->isValid()){
                $comprovante3 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante3, $ponto->comprovante3);
                $ponto->update([
                    'comprovante3' => $comprovante3
                ]);
            }

            if(isset($request->comprovante4) && $request->comprovante4->isValid()){
                $comprovante4 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante4, $ponto->comprovante4);
                $ponto->update([
                    'comprovante4' => $comprovante4,
                ]);
            }

            // verificando se existe o ponto de saida e redirecionando para um recurso calculador de hora extra
            if (isset($request->saida) && $request->saida != '') {
                $horas = $this->hora_extra->calcularHoraExtra($request);

                // --------------------------------------------------------------------------
                // Verificando se a hora é negativa ou positiva e atalizando o banco de dados
                // --------------------------------------------------------------------------
                if ( $horas[0] == '-') {
                    $ponto->update([
                        'horas_extras' => '00:00:00',
                        'horas_negativas' => $horas[1]
                    ]);
                }elseif ( $horas[0] == '+'){
                    $ponto->update([
                        'horas_extras' => $horas[1],
                        'horas_negativas' => '00:00:00',
                    ]);
                }else{
                    $ponto->update([
                        'horas_extras' => '00:00:00',
                        'horas_negativas' => '00:00:00',
                    ]);
                }
            }else{
                $ponto->update([
                    'horas_extras' => '00:00:00',
                    'horas_negativas' => '00:00:00',
                ]);
            }

            DB::commit();
            return redirect()->route('ponto.index')->with('success', 'Ponto Cadastrado com Sucesso!');

        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withInput()->with('info', 'Erro ao Cadastrar Ponto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ponto $ponto)
    {
        return view('ponto.show', compact('ponto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edite(Ponto $ponto)
    {
        return view('ponto.edite', compact('ponto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ponto $ponto)
    {
        try {
            DB::beginTransaction();

            $ponto->update($request->all());

            if(isset($request->comprovante1) && $request->comprovante1->isValid()){
                $comprovante1 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante1, $ponto->comprovante1);
                $ponto->update([
                    'comprovante1' => $comprovante1,
                ]);
            }

            if(isset($request->comprovante2) && $request->comprovante2->isValid()){
                $comprovante2 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante2, $ponto->comprovante2);
                $ponto->update([
                    'comprovante2' => $comprovante2,
                ]);
            }

            if(isset($request->comprovante3) && $request->comprovante3->isValid()){
                $comprovante3 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante3, $ponto->comprovante3);
                $ponto->update([
                    'comprovante3' => $comprovante3
                ]);
            }

            if(isset($request->comprovante4) && $request->comprovante4->isValid()){
                $comprovante4 = $this->anexo->Store($ponto->id, auth()->user()->id, $request->comprovante4, $ponto->comprovante4);
                $ponto->update([
                    'comprovante4' => $comprovante4,
                ]);
            }

            // verificando se existe o ponto de saida e redirecionando para um recurso calculador de hora extra
            if (isset($request->saida) && $request->saida != '') {
                $horas = $this->hora_extra->calcularHoraExtra($request);
                // --------------------------------------------------------------------------
                // Verificando se a hora é negativa ou positiva e atalizando o banco de dados
                // --------------------------------------------------------------------------
                if ( $horas[0] == '-') {
                    $ponto->update([
                        'horas_extras' => '00:00:00',
                        'horas_negativas' => $horas[1]
                    ]);
                }elseif ( $horas[0] == '+'){
                    $ponto->update([
                        'horas_extras' => $horas[1],
                        'horas_negativas' => '00:00:00',
                    ]);
                }else{
                    $ponto->update([
                        'horas_extras' => '00:00:00',
                        'horas_negativas' => '00:00:00',
                    ]);
                }
            }else{
                $ponto->update([
                    'horas_extras' => '00:00:00',
                    'horas_negativas' => '00:00:00',
                ]);
            }

            DB::commit();
            return redirect()->route('ponto.index')->with('success', 'Ponto Atualizado com Sucesso!');

        } catch (Exception $e) {
            DB::rollBack();
                return redirect()->back()->withInput()->with('info', 'Erro ao Atualizar Ponto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ponto $ponto)
    {
        // REMOVENDO REGISTRO DA TABELA FILIAL_USER, USER E INATIVANDO DA TABELA FUNCIONARIOS
        try {
            $ponto->delete();
            return back()->with('success', 'Ponto removido com sucesso.');
        } catch (\Exception $th) {
            return back()->withErrors($th->getMessage());
            return back()->with('error', 'Não foi possível remover este ponto.');
        }
    }

    function HoraExtra()
    {
        #-----------------------------------------------------------------------------------
        #| Verificando se a data atual é maior que dia 21 do mês atual e menor que dia 1 do próximo mês |
        #-----------------------------------------------------------------------------------
        if (carbon::now() >= carbon::now()->day(21) && carbon::now() < carbon::now()->add(1, 'month')->day(1)) {
            #------------------------------------------
            #| Criando a data inícial a ser comparada |
            #------------------------------------------
            $data_inicio = carbon::now()->day(21)->toDateString();
            #----------------------------------------
            #| Criando a data final a ser comparada |
            #----------------------------------------
            $data_fim = carbon::now()->toDateString();

        }else {
            #----------------------------------------------------------------------------------------------------
            #| Caso não caia na condição acima pega o dia 21 do mês anterior e dia atual do mês a ser comparado|
            #----------------------------------------------------------------------------------------------------

            #------------------------------------------
            #| Criando a data inícial a ser comparada |
            #------------------------------------------
            $data_inicio = carbon::now()->sub('1 month')->day(21)->toDateString();

            #---------------------------------------
            #| Criando a data final a ser comparda |
            #---------------------------------------
            $data_fim = carbon::now()->toDateString();
            // dd($data_inicio, $data_fim );
        }

        #------------------------------
        #| Recebendo o usuario logado |
        #------------------------------
        $user = auth()->user()->funcionario;

        #-----------------------------------------------------------------------------------
        #| Recebendo os registros do ponto que se enquadra entre as datas de inicio e fim  |
        #-----------------------------------------------------------------------------------
        $pontos = $user->pontos()->whereBetween('data', [$data_inicio, $data_fim])->orderBy('data', 'asc')->where('tipo', 1)->get();

        #---------------------------------
        #| Iniciando a hora extra zerada |
        #---------------------------------
        $hora_extra = carbon::create('00','00','00');

        #------------------------------------
        #| Iniciando a hora negativa zerada |
        #------------------------------------
        $hora_negativas = carbon::create('00','00','00');

        foreach ($pontos as $key => $ponto) {
            if ($ponto->horas_extras != '00:00:00') {
                $horas = explode(':', $ponto->horas_extras);
                $hora_extra->addHours($horas[0]);
                $hora_extra->addMinutes($horas[1]);
                $hora_extra->addSeconds($horas[2]);

            } elseif ($ponto->horas_negativas != '00:00:00') {
                $horas = explode(':', $ponto->horas_negativas);
                $hora_negativas->addHours($horas[0]);
                $hora_negativas->addMinutes($horas[1]);
                $hora_negativas->addSeconds($horas[2]);
            }
        }

        #---------------------------------------------
        #| Calculando horas negativas e horas extras |
        #---------------------------------------------
        // if ($hora_extra->toTimeString() != '00:00:00') {
            if ($hora_extra > $hora_negativas) {
                $hora_n = explode(':', $hora_negativas->toTimeString());
                // if ($hora_n[0] != '00')
                    $hora_extra->subHours($hora_n[0]);
                    // $hora_negativas->subHours($hora_n[0]);
                // if ($hora_n[1] != '00')
                    $hora_extra->subMinutes($hora_n[1]);
                    // $hora_negativas->subHours($hora_n[1]);
                // if ($hora_n[2] != '00')
                    $hora_extra->subSeconds($hora_n[2]);
                    // $hora_negativas->subHours($hora_n[2]);
            }else{
                $hora_x = explode(':', $hora_extra->toTimeString());
                // if ($hora_x[0] != '00')
                    $hora_negativas->subHours($hora_x[0]);
                    // $hora_extra->subHours($hora_x[0]);
                // if ($hora_x[1] != '00')
                    $hora_negativas->subMinutes($hora_x[1]);
                    // $hora_extra->subMinutes($hora_x[1]);
                // if ($hora_x[2] != '00')
                    $hora_negativas->subSeconds($hora_x[2]);
                    // $hora_extra->subSeconds($hora_x[2]);
            }
        // }

        #------------------------------------
        #| Convertendo horários para String |
        #------------------------------------
        $hora_extra = $hora_extra->toTimeString();
        $hora_negativas = $hora_negativas->toTimeString();
        // $result[] = ['Data', 'Extra', 'Negativa'];
        // foreach ($pontos as $key => $value) {
        //     $result[++$key] = [$value->data, $value->horas_extras, $value->horas_negativas];
        // }
        // return view('ponto.hora-extra', compact('pontos', 'hora_extra', 'hora_negativas'));
        return $horas = [$hora_extra, $hora_negativas];
    }

    public function relatorio(Request $request) {

        $nextmes = intval($request->mes + 1);
        
        if ($request->mes <= 9) {
            $request['mes'] = "0{$request->mes}";
        }
        if ($nextmes <= 9) {
            $request['next_mes'] = "0{$nextmes}";
        }

        $data_inicio = carbon::createFromDate("2024-{$request['mes']}-21")->modify('-1 month')->toDateString();
    
        $data_fim = carbon::createFromDate("2024-{$request['mes']}-20")->toDateString();

        // dd($request->next_mes,$data_inicio, $data_fim);
        $mes = $request->mes;
        $next_mes = $request->next_mes;
        $funcionario_id = $request['funcionario'];
        $user = [];
        $user_name = '';

        if (isset($request['funcionario']) != '') {
            $funcionario = Funcionario::FirstWhere('id', $request['funcionario']);

            $user_id = $funcionario->id;
            $user_name = $funcionario->nome;
            $cargo = $funcionario->funcao->nome;
        }else{
            $user_id = auth()->user()->id;
            $user_name = auth()->user()->funcionario->nome;
            $cargo = auth()->user()->funcionario->funcao->nome;
        }

        $funcionarios = Funcionario::where('filial_id', session('filial')->id)->get();

        if (isset($request->mes)) {
            // dd($data_inicio, $data_fim);
            $pontos = Ponto::orderBy('data', 'asc')->where('funcionario_id', $user_id)->get();
            $pontos = $pontos->whereBetween('data', [ $data_inicio, $data_fim ]);
            // dd($pontos);
        }else{
            $pontos = [];
        }

        if (isset($request->mes) == '') {
            return back()->with('info', 'Necessário informar o mês');
        } 
        // elseif (isset($request->data_fim) == '' && $request->data_inicio){
        //     return back()->with('info', 'Necessário informar a data final');
        // } elseif (isset($request->funcionario) && $request->data_inicio == '' && $request->data_fim == ''){
        //     return back()->with('info', 'Necessário informar as datas');
        // }

        //  elseif ((!isset($request->data_inicio)) && (!isset($request->data_fim))) {
        //     return back()->with('info', 'Necessário informar as datas');
        // }

        // if (isset($request->entrada)) {
        //     $pontos = $pontos->where('entrada', $request->entrada);
        // }
        // if (isset($request->entrada_almoco)) {
        //     $pontos = $pontos->where('entrada_almoco', $request->entrada_almoco);
        // }
        // if (isset($request->saida_almoco)) {
        //     $pontos = $pontos->where('saida_almoco', $request->saida_almoco);
        // }
        // if (isset($request->saida)) {
        //     $pontos = $pontos->where('saida', $request->saida);
        // }

        // $pontos = $pontos->get();

        // $pontos->map(function($item){
        //     $mes = explode('-', $item->data);

        //     $item['mes'] = [];

        //     if (!(in_array($mes[1], $item['mes']))) {
        //         $item['mes'] = $mes[1];
        //     }
        // });
        $meses = [1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];
        // dd($meses);
        return view('ponto._partials.relatorio', compact(
            'pontos',
            'funcionarios',
            'user_id',
            'data_inicio',
            'data_fim',
            'user_name',
            'cargo',
            'funcionario_id',
            'meses',
            'mes',
            'next_mes'
        ));

    }

    public function pdf(Request $request){
        $mes = '';
        $next_mes = '';
        
        $meses = [1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'];
        foreach ($meses as $key => $value) {
            if ($request->mes == $key) {
                $mes = $value;
            }
            if ($request->next_mes == $key) {
                $next_mes = $value;
            }
        }

        $pontos = Ponto::whereBetween('data', [ $request->data_inicio, $request->data_fim ])->where('user_id', $request->user_id)->orderby('data','asc')->get();

        #---------------------------------
        #| Iniciando a hora extra zerada |
        #---------------------------------
        $hora_extra = carbon::create('00','00','00');

        #------------------------------------
        #| Iniciando a hora negativa zerada |
        #------------------------------------
        $hora_negativas = carbon::create('00','00','00');
        
        foreach ($pontos as $key => $ponto) {
            if ($ponto->horas_extras != '00:00:00') {
                $horas = explode(':', $ponto->horas_extras);
                $hora_extra->addHours($horas[0]);
                $hora_extra->addMinutes($horas[1]);
                $hora_extra->addSeconds($horas[2]);

            } elseif ($ponto->horas_negativas != '00:00:00') {
                $horas = explode(':', $ponto->horas_negativas);
                $hora_negativas->addHours($horas[0]);
                $hora_negativas->addMinutes($horas[1]);
                $hora_negativas->addSeconds($horas[2]);
            }
        }

        #---------------------------------------------
        #| Calculando horas negativas e horas extras |
        #---------------------------------------------
        if ($hora_extra > $hora_negativas) {
            $hora_n = explode(':', $hora_negativas->toTimeString());
            // if ($hora_n[0] != '00')
                $hora_extra->subHours($hora_n[0]);
                // $hora_negativas->subHours($hora_n[0]);
            // if ($hora_n[1] != '00')
                $hora_extra->subMinutes($hora_n[1]);
                // $hora_negativas->subHours($hora_n[1]);
            // if ($hora_n[2] != '00')
                $hora_extra->subSeconds($hora_n[2]);
                // $hora_negativas->subHours($hora_n[2]);
        }else{
            $hora_x = explode(':', $hora_extra->toTimeString());
            // if ($hora_x[0] != '00')
                $hora_negativas->subHours($hora_x[0]);
                // $hora_extra->subHours($hora_x[0]);
            // if ($hora_x[1] != '00')
                $hora_negativas->subMinutes($hora_x[1]);
                // $hora_extra->subMinutes($hora_x[1]);
            // if ($hora_x[2] != '00')
                $hora_negativas->subSeconds($hora_x[2]);
                // $hora_extra->subSeconds($hora_x[2]);
        }

        #------------------------------------
        #| Convertendo horários para String |
        #------------------------------------
        $hora_extra = $hora_extra->toTimeString();
        $hora_negativas = $hora_negativas->toTimeString();
        // dd($hora_extra, $hora_negativas);
        
        $user_name = $request['user_name'];
        $cargo = $request['cargo'];
        
        // dd($request->all());
        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        return FacadePdf::loadView('ponto._partials.pdf.pontos-pdf', compact('pontos', 'user_name', 'cargo', 'mes', 'next_mes', 'hora_extra', 'hora_negativas'))
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        // ->download
        ->stream('pontos'.date('m').'-'.auth()->user()->name.'.pdf');
    }

    public function xlsx(Request $request){

        $pontos = $request->all();
        
        $PontosXLSX = new PontosExport($pontos);

        return Excel::download($PontosXLSX, 'Pontos-'.date('m').'-'.auth()->user()->name.'.xlsx');

    }

    public function csv(Request $request){
        dd($request);
        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        return FacadePdf::loadView('ponto._partials.pdf.pontos-pdf', compact('pontos'))
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        // ->download
        ->stream('pontos'.date('m').'-'.auth()->user()->name.'.pdf');
    }
}

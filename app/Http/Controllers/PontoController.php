<?php

namespace App\Http\Controllers;

use App\Exports\PontosExport;
use Illuminate\Http\Request;
use App\Models\Ponto;
use Illuminate\Support\Facades\DB;
use App\Recursos\Anexo;
use App\Recursos\HoraExtra;
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
        $user = auth()->user();
        $pontos = $user->pontos()->orderBy('data', 'asc')->paginate(10);

        return view('ponto.index', compact('pontos', 'user'));
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
            
            $dados['user_id'] = auth()->user()->id;
            
            if (Ponto::firstWhere('data', $request['data'])) {
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
        //
    }

    public function HoraExtra()
    {
        #-----------------------------------------------------------------------------------
        #| Verificando se a data atual é maior que dia 21 e menor que dia 1 do próximo mês |
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
            #| Caso não caia na condição acima pega o dia 21 do mês anterior e dia atual do mês  a ser comparado|
            #----------------------------------------------------------------------------------------------------

            #------------------------------------------
            #| Criando a data inícial a ser comparada |
            #------------------------------------------
            $data_inicio = carbon::now()->sub('1 month')->day(21)->toDateString();
            
            #---------------------------------------
            #| Criando a data final a ser comparda |
            #---------------------------------------
            $data_fim = carbon::now()->toDateString();

        }

        #------------------------------
        #| Recebendo o usuario logado |
        #------------------------------
        $user = auth()->user(); 

        #-----------------------------------------------------------------------------------
        #| Recebendo os registros do ponto onde se enquadra entre as datas de inicio e fim |
        #-----------------------------------------------------------------------------------
        $pontos = $user->pontos()->whereBetween('data', [$data_inicio, $data_fim])->orderBy('data', 'asc')->where('dsr', 0)->get();
        
        #---------------------------------
        #| Iniciando a hora extra zerada |
        #---------------------------------
        $hora_extra = carbon::create('00','00','00');

        #------------------------------------
        #| Calculando a hora negativa |
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
        if ($hora_extra->toTimeString() != '00:00:00') {
            if ($hora_extra > $hora_negativas) {
                $hora_n = explode(':', $hora_negativas->toTimeString());  
                if ($hora_n[0] != '00')
                    $hora_extra->subHours($hora_n[0]);
                if ($hora_n[1] != '00')
                    $hora_extra->subMinutes($hora_n[1]);
                if ($hora_n[2] != '00')
                    $hora_extra->subSeconds($hora_n[2]);
            }else{
                $hora_x = explode(':', $hora_extra->toTimeString());  
                if ($hora_x[0] != '00')
                    $hora_negativas->subHours($hora_x[0]);
                    $hora_extra->subHours($hora_x[0]);
                if ($hora_x[1] != '00')
                    $hora_negativas->subMinutes($hora_x[1]);
                    $hora_extra->subMinutes($hora_x[1]);
                if ($hora_x[2] != '00')
                    $hora_negativas->subSeconds($hora_x[2]);
                    $hora_extra->subSeconds($hora_x[2]);
            }
        }
    
        #------------------------------------
        #| Convertendo horários para String |
        #------------------------------------
        $hora_extra = $hora_extra->toTimeString();
        $hora_negativas = $hora_negativas->toTimeString();
        
        return view('ponto.hora-extra', compact('pontos', 'hora_extra', 'hora_negativas'));
    }

    public function relatorio(Request $request) {
        $user = auth()->user();
        $pontos = Ponto::orderBy('data', 'asc')->where('user_id', $user->id)->get();
        
        if (isset($request->data_fim) && $request->data_inicio == '') {
            return back()->with('info', 'Necessário informar a data inícial após informa a data final');
        }

        if (isset($request->data_inicio) && isset($request->data_fim)) {
            $pontos = $pontos->whereBetween('data', [ $request->data_inicio, $request->data_fim ]);
        }elseif (isset($request->data_inicio)) {
            $pontos = $pontos->where('data', $request->data_inicio);
        }

        if (isset($request->entrada)) {
            $pontos = $pontos->where('entrada', $request->entrada);
        }
        if (isset($request->entrada_almoco)) {
            $pontos = $pontos->where('entrada_almoco', $request->entrada_almoco);
        }
        if (isset($request->saida_almoco)) {
            $pontos = $pontos->where('saida_almoco', $request->saida_almoco);
        }
        if (isset($request->saida)) {
            $pontos = $pontos->where('saida', $request->saida);
        }

        // $pontos = $pontos->get();

        // $pontos->map(function($item){
        //     $mes = explode('-', $item->data);
            
        //     $item['mes'] = [];

        //     if (!(in_array($mes[1], $item['mes']))) {
        //         $item['mes'] = $mes[1];
        //     } 
        // });
        // $meses = [1 => 'janeiro', 2 => 'fevereiro', 3 => 'março', 4 => 'abril', 5 => 'mail', 6 => 'junho', 7 => 'julho', 8 => 'agosto', 9 => 'setembro', 10 => 'outubro', 11 => 'novembro', 12 => 'dezembro'];
        

        return view('ponto._partials.relatorio', compact('pontos'));

    }
    
    public function pdf(Request $request){
        $pontos = $request->all();
        // dd($pontos);
        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        return Pdf::loadView('ponto._partials.pdf.pontos-pdf', compact('pontos'))
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
        return Pdf::loadView('ponto._partials.pdf.pontos-pdf', compact('pontos'))
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        // ->download
        ->stream('pontos'.date('m').'-'.auth()->user()->name.'.pdf');
    }
}

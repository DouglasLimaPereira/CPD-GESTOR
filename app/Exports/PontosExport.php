<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PontosExport implements FromView
{
    protected $PontosXLSX;

    public function __construct(array $PontosXLSX)
    {
        $this->PontosXLSX = $PontosXLSX;
    } 

    public function view(): View
    {
        $pontos = $this->PontosXLSX;
        return view('ponto._partials.excel.pontos-excel', compact('pontos'));
    }
}

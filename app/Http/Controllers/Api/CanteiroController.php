<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Canteiro;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CanteiroController extends Controller
{
    public function removeImage(Canteiro $canteiro, Request $request)
    {
        if(isset($request->remover_logotipo) && $canteiro->logotipo){
            try {
                if(Storage::exists($canteiro->logotipo))
                    Storage::delete($canteiro->logotipo);
                
                //Atualiza o campo logotipo
                $canteiro->update(['logotipo' => null]);

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
}

<?php

namespace App\Recursos;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class Anexo
{
    public function store($ponto_id, $user_id, $anexo, $anexo_banco, )
    {
        //Deletando o arquivo caso já exista algum
        // dd('oi');
        if(Storage::disk('public')->exists($anexo_banco))
        Storage::disk('public')->delete($anexo_banco);

        return $anexo->store('ponto/' . base64_encode($ponto_id) . '/usuario/' .base64_encode($user_id).'/comprovante', 'public');
    }

    // public function storeWithResize($ponto = null, $user = null, $anexo_banco, $diretorio, $anexo)
    // {
    //     //Deletando o arquivo caso já exista algum
    //     if(Storage::disk('public')->exists($anexo_banco))
    //     Storage::disk('public')->delete($anexo_banco);
        
    //     //Verifica se o arquivo enviado é válido
        
    //     if($anexo->isValid())
    //     {
    //         $anexo_nome = Str::uuid(). '.' . $anexo->getClientOriginalExtension();
    //         dd($ponto, $user, $anexo_banco, $diretorio, $anexo);
    //         $dir = null;
    //         if($user) $dir .= 'usuario/'.base64_encode($user).'/';
    //         $dir .= $diretorio;

    //         $imagem = Image::make($anexo)->resize(1980, null, function($constraint)
    //         {
    //             $constraint->aspectRatio();
    //         });
            
    //         Storage::disk('public')->put($dir.$anexo_nome, $imagem->encode());

    //         return $dir.$anexo_nome;
    //     }else{
    //         dd('Não é válido');
    //     }
    // }

    public function update($ponto = null, $user = null, $model, $anexo_banco, $diretorio, $anexo)
    {
        //Deletando o arquivo caso já exista algum
        if(Storage::disk('public')->exists($anexo_banco))
            Storage::disk('public')->delete($anexo_banco);
        // dd('anexo');
        //Verifica se o arquivo enviado é válido
        if($anexo->isValid())
        {
            //Cadastrando a nova logotipo
            $anexo_nome = sha1(date('Y-m-d H:m:s')). '.' . $anexo->getClientOriginalExtension();
            //Registrando o diretório
            $dir = null;
            if($user) $dir .= 'usuario/'.base64_encode($user).'/';
            $dir .= $diretorio;

            return $anexo->storeAs($dir, $anexo_nome, 'public');

        }
    }
}
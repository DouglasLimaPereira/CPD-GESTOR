<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $table = 'funcoes';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function salario()
    {
        //Verficar este relacionamento
        return $this->belongsTo(Salario::class);
    }

    public function funcaoFuncionario()
    {
        return $this->hasOne(funcionario::class);
    }
}

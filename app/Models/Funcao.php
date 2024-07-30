<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $table = 'funcoes';

    protected $fillable = [
        'filial_id',
        'nome',
        'descricao',
    ];

    public function salario()
    {
        return $this->hasOne(Salario::class);
    }

    public function funcaoFuncionario()
    {
        return $this->hasOne(funcionario::class);
    }

    public function filiais()
    {
        return $this->hasMany(Filial::class);
    }
}

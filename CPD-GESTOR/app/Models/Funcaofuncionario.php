<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcaofuncionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'funcionario_id',
        'funcao_id',
        'data_atribuicao',
        'active'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function funcao()
    {
        return $this->BelongsTo(Funcoes::class);
    }
}

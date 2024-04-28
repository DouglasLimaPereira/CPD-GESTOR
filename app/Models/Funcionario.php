<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'filial_id',
        'funcao_id',
        'matricula',
        'nome',
        'telefone',
        'superadmin',
        'imagem',
        'situacao_admissional',
        'data_admissao',
        'data_demissao',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }
}

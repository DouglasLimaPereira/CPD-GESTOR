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
        'company_id',
        'pessoa_id',
        'matricula',
        'situacao_admissional',
        'data_admissao',
        'data_demissao',
        'active',
        'cad_user_id'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function funcoes()
    {
        return $this->hasMany(Funcaofuncionario::class);
    }
}

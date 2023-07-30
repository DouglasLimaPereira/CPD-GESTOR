<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Canteiro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'company_id',
        'funcionario_id',
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'telefone',
        'email',
        'limite_armazenamento',
        'total_funcionarios',
        'total_unidades',
        'tamanho_anexo',
        'logotipo',
        'data_inicio',
        'data_termino',
        'estado',
        'active',
        'cad_user_id',
        'logo_origem'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function fatores()
    {
        return $this->hasMany(Fator::class)->orderBy('data_vigencia', 'desc');
    }

    public function funcionarios()
    {
        return $this->hasMany(Canteirofuncionario::class);
    }

    public function medicoes()
    {
        return $this->hasMany(Medicao::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'uf',
        'email',
        'email_financeiro',
        'email_comercial',
        'logotipo',
        'estado',
        'limite_anexo',
        'logo_origem',
        'telefone',
        'whatsapp',
        'website',
        'facebook',
        'instagram'
    ];

    public function canteiros()
    {
        return $this->hasMany(Canteiro::class);
    }

    public function companyusers()
    {
        return $this->hasMany(Companyuser::class);
    }

    public function fatores()
    {
        return $this->hasMany(Fator::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function funcoes()
    {
        return $this->hasMany(Funcao::class);
    }

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class);
    }

    public function users()
    {
        return $this->hasMany(Companyuser::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}

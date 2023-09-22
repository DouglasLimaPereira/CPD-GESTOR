<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;
    
    protected $table = 'Filiais';

    protected $fillable = [
        'nome_fantasia',
        'logo',
        'email',
        'email_comercial',
        'telefone',
        'site',
        'instagram',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cnpj',
    ];
}

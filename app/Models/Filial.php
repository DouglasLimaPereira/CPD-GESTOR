<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;
    
    protected $table = 'filiais';

    protected $fillable = [
        'nome_fantasia',
        'razao_social',
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

    public function usuarios(){
        return $this->belongsToMany(User::class)->withPivot('filial_id', 'user_id', 'superadmin')->withTimestamps();
    }

    
}

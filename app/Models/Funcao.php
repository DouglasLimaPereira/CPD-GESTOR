<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'nome',
        'descricao',
        'tipo',
        'active',
        'user_cad_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function salarios()
    {
        //Verficar este relacionamento
        return $this->hasMany(Funcaosalario::class);
    }

    public function funcaoFuncionario()
    {
        return $this->hasMany(Funcaofuncionario::class);
    }    
}

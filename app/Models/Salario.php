<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salario extends Model
{
    use HasFactory;

    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'funcao_id',
        'valor',
        'data_atualizacao',
    ];

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}

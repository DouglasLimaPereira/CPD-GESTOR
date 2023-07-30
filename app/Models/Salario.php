<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salario extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'canteiro_id',
        'funcao_id',
        'valor',
        'data_vigencia',
        'data_atualizacao',
        'cad_user_id',
        'active'
    ];

    public function canteiro()
    {
        return $this->belongsTo(Canteiro::class);
    }
}

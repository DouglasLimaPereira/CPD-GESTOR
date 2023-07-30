<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fator extends Model
{
    use HasFactory;

    protected $table = 'fatores';

    protected $fillable = [
        'canteiro_id',
        'indice_produtivo',
        'indice_improdutivo',
        'indice_feriado',
        'data_vigencia',
        'cad_user_id',
    ];

    public function canteiro()
    {
        return $this->belongsTo(Canteiro::class);
    }

    public function medicoes()
    {
        return $this->hasMany(Medicao::class);
    }
}

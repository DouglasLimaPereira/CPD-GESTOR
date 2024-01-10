<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acessomaxipos extends Model
{
    use HasFactory;

    protected $fillable = [
        'filial_id',
        'cod_gm',
        'nome',
        'login',
        'senha',
    ];
}

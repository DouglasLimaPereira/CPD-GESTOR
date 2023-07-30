<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Errositef extends Model
{
    use HasFactory;

    protected $table = 'Errositefes';
    protected $fillable = [
        'codigo',
        'titulo',
        'descricao',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulosubitempermissao extends Model
{
    use HasFactory;

    protected $table = 'modulosubitempermissoes';

    protected $fillable = [
        'modulosubitem_id',
        'permissao_id'
    ];
}

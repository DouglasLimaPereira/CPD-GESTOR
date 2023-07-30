<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Canteirofuncionario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'canteiro_id',
        'funcionario_id',
        'gerente',
        'data_vinculo',
        'data_desligamento',
        'active'
    ];

    public function canteiros()
    {
        return $this->belongsTo(Canteiro::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}

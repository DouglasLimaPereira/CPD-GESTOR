<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medicoes';
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'canteiro_id',
        'tipo',
        'data_inicio',
        'data_termino',
        'valor',
        'nome',
        'descricao',
        'estado',
        'fornecedor_id',
        'user_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function canteiro()
    {
        return $this->belongsTo(Canteiro::class);
    }
}

<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'dsr',
        'data',
        'entrada',
        'comprovante1',
        'entrada_almoco',
        'comprovante2',
        'saida_almoco',
        'comprovante3',
        'saida',
        'comprovante4',
        'horas_extras',
        'horas_negativas',
    ];

    /**
     * Get the user that owns the Ponto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

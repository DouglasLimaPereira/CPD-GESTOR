<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Escala extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'evento',
        'color',
        'data_inicio',
        'data_fim'
    ];

    /**
     * Get all of the comments for the Escala
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moduloitem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'moduloitens';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'modulo_id',
        'nome',
        'slug',
        'active',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function subitens()
    {
        return $this->hasMany(Modulosubitem::class);
    }
}

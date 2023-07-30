<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';

    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'active'
    ];

    public function itens()
    {
        return $this->belongsToMany(Moduloitem::class)->withTimestamps();
    }
    
    public function subitens()
    {
        return $this->belongsToMany(Modulosubitem::class)->withTimestamps();
    }
}

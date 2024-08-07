<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'itens';
    protected $fillable = [
        'id',
        'filial_id',
        'nome',
        'marca',
        'serial',
        'descricao',
        'preco',
    ];

    public function estoque(){
        return $this->BelongsToMany(Estoque::class);
    }

    public function filial(){
        return $this->BelongsToMany(Filial::class);
    }
}

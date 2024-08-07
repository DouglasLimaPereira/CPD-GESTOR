<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'filial_id',
        'item_id',
        'quantidade',
        'situacao',
    ];

    public function item(){
        return $this->hasMany(Item::class);
    }
}

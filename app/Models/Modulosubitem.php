<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulosubitem extends Model
{
    use HasFactory;

    protected $table = 'modulosubitens';

    protected $fillable = [
        'modulo_id',
        'moduloitem_id',
        'item_id',
        'nome',
        'slug',
        'active',
    ];

    public function moduloitem()
    {
        return $this->belongsTo(Moduloitem::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class)->withTimestamps();
    }
}

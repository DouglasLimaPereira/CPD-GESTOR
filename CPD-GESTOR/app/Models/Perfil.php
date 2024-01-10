<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deletad_at'];

    protected $table = 'perfis';

    protected $fillable = [
        'company_id',
        'nome',
        'descricao',
        'active'
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}

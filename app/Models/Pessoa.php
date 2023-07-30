<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'nome',
        'cpf',
        'email',
        'email_secundario',
        'telefone',
        'cargo',
        'cad_user_id',
        'estado',
        'descricao',
        'engenharia',
        'seguranca'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companyuser()
    {
        return $this->hasOne(Companyuser::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companyuser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'company_id',
        'canteiro_id',
        'perfil_id',
        'pessoa_id',
        'user_id',        
        'superadmin',
        'active',
        'imagem',
        'telefone',
        'imagem_origem'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function canteiro()
    {
        return $this->belongsTo(Cantiro::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
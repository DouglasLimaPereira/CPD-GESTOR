<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\RecuperaSenhaNotification;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'superadmin',
        'imagem',
        'telefone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'email',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Definindo email de recuperação de senha
    public function sendPasswordResetNotification( $token )
    {
        
        $this->notify(new RecuperaSenhaNotification($token));
 
    }

    public function companies()
    {
       // return $this->belongsToMany(Company::class)->withPivot('pessoa_id', 'superadmin', 'active')->withTimestamps();
    
       return $this->hasOne(Companyuser::class);
    }

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class);
    }
}
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
        'email',
        'password',
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

    public function filiais()
    {
       return $this->belongsToMany(Filial::class)->withPivot('user_id', 'filial_id', 'superadmin')->withTimestamps();
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pontos()
    {
        return $this->hasMany(Ponto::class);
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Removemos o 'HasApiTokens' daqui para sumir o erro
    use HasFactory, Notifiable;

    /**
     * Campos que podem ser preenchidos (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Campos escondidos em consultas
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversão de tipos
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * RELACIONAMENTO: Um usuário tem um carrinho aberto
     */
    public function carrinho()
    {
        return $this->hasOne(Carrinho::class, 'user_id')->where('status', 'aberto');
    }
}
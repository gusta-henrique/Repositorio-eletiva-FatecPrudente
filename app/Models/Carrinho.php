<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinhos';

    protected $fillable = [
        'user_id',
        'status'
    ];

    // Relacionamento: Um carrinho tem muitos itens
    public function itens()
    {
        return $this->hasMany(CarrinhoItem::class, 'carrinho_id');
    }

    // Relacionamento: Um carrinho pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
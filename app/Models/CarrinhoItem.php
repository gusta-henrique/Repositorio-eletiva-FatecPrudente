<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarrinhoItem extends Model {
    protected $table = 'carrinho_itens';
    protected $fillable = ['carrinho_id', 'produto_id', 'quantidade', 'preco_unitario'];

    public function produto() {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
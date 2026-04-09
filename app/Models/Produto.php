<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // O 'estoque' precisa estar aqui para o Laravel permitir o salvamento
    protected $fillable = ['nome', 'descricao', 'preco', 'foto', 'categoria_id', 'estoque'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
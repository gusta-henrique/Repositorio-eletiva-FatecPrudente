<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'preco', 'foto', 'categoria_id', 'estoque'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
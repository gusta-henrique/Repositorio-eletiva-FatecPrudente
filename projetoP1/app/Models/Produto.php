<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public $incrementing = true;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'loja_id',
        'categoria_id'
    ];

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
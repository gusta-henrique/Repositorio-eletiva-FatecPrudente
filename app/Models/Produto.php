<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Nome da tabela no banco
    protected $table = 'produtos';

    // Campos que podem ser preenchidos (devem bater com o seu SQL)
    protected $fillable = [
        'nome', 
        'descricao', 
        'preco', 
        'estoque', 
        'categoria_id'
    ];

    // Relacionamento: Um produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}


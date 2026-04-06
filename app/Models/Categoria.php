<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nome', 'descricao'];

    // Uma categoria tem muitos produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}
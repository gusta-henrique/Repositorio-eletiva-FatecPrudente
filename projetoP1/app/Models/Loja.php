<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $table = 'lojas';

    public $incrementing = true;

    protected $fillable = [
        'nome',
        'descricao',
        'telefone',
        'whatsapp',
        'email',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'horario_funcionamento',
        'logo'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}

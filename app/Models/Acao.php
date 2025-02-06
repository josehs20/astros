<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{

    protected $table = 'acoes'; // Nome da tabela no banco

    protected $fillable = [
        'descricao',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
 
    protected $table = 'grupo_usuarios'; // Nome da tabela no banco

    protected $fillable = [
        'descricao',
    ];
}

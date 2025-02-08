<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $table = 'processos'; // Nome da tabela no banco

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'rota',
        'icon',
        'posicao_menu',
    ];
}

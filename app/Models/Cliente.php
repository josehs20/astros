<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // Nome da tabela no banco de dados

    protected $fillable = [
        'nome',
        'data_nascimento',
        'tel',
        'usuario_id',
        'tempo_usado',
        'tempo',
        'tempo_total_usado',
        'total_gasto',
    ];

    protected $dates = [
        'data_nascimento',
        'tempo_usado',
        'tempo',
        'tempo_total_usado'
    ];

    /**
     * Relacionamento com a tabela de usuários
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

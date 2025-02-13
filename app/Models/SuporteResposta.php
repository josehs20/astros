<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuporteResposta extends Model
{
    protected $table = 'suporte_respostas';

    protected $fillable = [
        'usuario_id',
        'suporte_id',
        'mensagem',
        'ativo',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function suporte()
    {
        return $this->belongsTo(Suporte::class, 'suporte_id');
    }
}

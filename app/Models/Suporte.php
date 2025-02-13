<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    protected $table = 'suportes';

    protected $fillable = [
        'usuario_id',
        'assunto',
        'mensagem',
        'status_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function respostas()
    {
        return $this->hasMany(SuporteResposta::class, 'suporte_id');
    }

    public function respostas_ativa()
    {
        return $this->hasMany(SuporteResposta::class, 'suporte_id')->where('ativo', true);
    }
}

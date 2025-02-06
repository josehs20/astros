<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioProcesso extends Model
{
  
    protected $table = 'usuario_processos'; // Nome da tabela no banco

    protected $fillable = [
        'processo_id',
        'grupo_usuario_id',
    ];

    // Relacionamento com a tabela 'processos'
    public function processo()
    {
        return $this->belongsTo(Processo::class, 'processo_id');
    }

    // Relacionamento com a tabela 'grupo_usuarios'
    public function grupoUsuario()
    {
        return $this->belongsTo(GrupoUsuario::class, 'grupo_usuario_id');
    }
}

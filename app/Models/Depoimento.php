<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
     // Caso o nome da tabela seja diferente do plural da model, defina explicitamente
     protected $table = 'depoimentos';

     // Defina os campos que podem ser preenchidos via atribuição em massa (mass assignment)
     protected $fillable = [
         'remetente_id',
         'destinatario_id',
         'depoimento',
         'resposta',
         'ativo',
     ];
 
     // Se desejar, pode adicionar relação com o modelo Usuario (se existir)
     public function remetente()
     {
         return $this->belongsTo(User::class, 'remetente_id');
     }

     public function destinatario_id()
     {
         return $this->belongsTo(User::class, 'destinatario_id');
     }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
     // Caso o nome da tabela seja diferente do plural da model, defina explicitamente
     protected $table = 'depoimentos';

     // Defina os campos que podem ser preenchidos via atribuição em massa (mass assignment)
     protected $fillable = [
         'usuario_id',
         'depoimento',
         'ativo',
     ];
 
     // Se desejar, pode adicionar relação com o modelo Usuario (se existir)
     public function usuario()
     {
         return $this->belongsTo(User::class, 'usuario_id');
     }
}

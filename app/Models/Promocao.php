<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    protected $table = 'promocoes';
    // Defina os campos que podem ser preenchidos em massa (mass assignable)
    protected $fillable = [
        'minuto',
        'pontos',
        'preco',
    ];


}

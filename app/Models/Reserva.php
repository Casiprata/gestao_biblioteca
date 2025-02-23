<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";
    protected $fillable = [
        'data_reserva', 
        'livro_fisico_id', 
        'usuario_id', 
        'observacao',
    ];
}

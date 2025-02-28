<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $fillable = [
        'data_emprestimo',
        'data_devolucao',
        'livro_fisico_id',
        'usuario_id',
        'observacao',
    ]; 
}

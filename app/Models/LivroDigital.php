<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivroDigital extends Model
{
    protected $table = "livro_digitals";
    protected $fillable = [
        'titulo',
        'autor_id',
        'genero_id',
        'editora_id',
        'edicao',
        'ano',
        'qtd_pagnas',
        'destinatario',
        'capa',
        'livro_pdf',
        'descricao',
    ];

    // Relacionamento 1 para 1
    public function autor(){
        return $this->belongsTo(Autor::class, 'autor_id','id');
    }

    // Relacionamento 1 para 1
    public function genero(){
        return $this->belongsTo(Genero::class, 'genero_id','id');
    }

    // Relacionamento 1 para 1
    public function editora(){
        return $this->belongsTo(Editora::class);
    }

 /*
   // Relacionamento 1 para muitos
   public function favoritos(){
    return $this->hasMany(Favorito::class);
}
*/
}

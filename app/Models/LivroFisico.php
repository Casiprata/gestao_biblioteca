<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivroFisico extends Model
{
   
   protected $fillable = [
       'titulo',
       'autor_id',
       'genero_id',
       'editora_id',
       'edicao',
       'ano',
       'capa',
       'quantidade',
       'destinatario',
       'estado',
       'descricao',
   ];
   
    // Relacionamento 1 para 1
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    
    // Relacionamento 1 para 1
    public function genero(){
        return $this->belongsTo(Genero::class);
    }
    
    // Relacionamento 1 para 1
    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    // Relacionamento 1 para muitos
    public function reservas(){
        return $this->hasMany(Reserva::class);
    }

    // Relacionamento 1 para muitos
    public function emprestimos(){
        return $this->hasMany(Emprestimo::class);
    }
/*
    // Relacionamento 1 para muitos
    public function devolucoes(){
        return $this->hasMany(Devolucao::class);
    }

    // Relacionamento 1 para muitos
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    // Relacionamento 1 para muitos
    public function avaliacoes(){
        return $this->hasMany(Avaliacao::class);
    }

    // Relacionamento 1 para muitos
    public function favoritos(){
        return $this->hasMany(Favorito::class);
    }
*/

}

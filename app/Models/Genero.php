<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';
    protected $fillable = ['nome', 'descricao'];

    public function livros()
{
    return $this->hasMany(LivroDigital::class, 'genero_id');
}


}



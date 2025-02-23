<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
   protected $table = "autors";
   protected $fillable = ['nome', 'nacionalidade'];
}

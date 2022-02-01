<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    // Ajustando nome da tabela para um correto ORM
   protected $table = 'fornecedores';

   protected $fillable = ['nome', 'site', 'uf', 'email'];

}

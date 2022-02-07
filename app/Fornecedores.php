<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Item;

class Fornecedores extends Model
{
    // Ajustando nome da tabela para um correto ORM
   protected $table = 'fornecedores';

   protected $fillable = ['nome', 'site', 'uf', 'email'];

   public function produtos(){
       return $this->hasMany('\App\Item', 'fornecedor_id', 'id');
   }

}

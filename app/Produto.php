<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\ProdutoDetalhe;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('\App\ProdutoDetalhe');
    }
}

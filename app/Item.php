<?php

namespace App;
use \App\ItemDetalhe;
use \App\Fornecedores;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe(){
        return $this->hasOne('\App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor(){
        return $this->belongsTo('\App\Fornecedores');
    }

    public function pedidos(){
        return $this->belongsToMany('\App\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}

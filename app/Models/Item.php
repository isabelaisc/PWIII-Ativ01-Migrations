<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table    = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe() {
        //estabelece um relacionamento com a tabela produto_detalhes utilizando a fk produto_id e pk id
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor() {
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedor_id', 'id');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Models\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}

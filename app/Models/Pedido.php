<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
        //withPivot() retorna os dados da tabela produto_pedido, não apenas as chaves estrangeiras
        return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at');

        /**
         * 1 - Modelo do relacionamento em relação ao Modelo que estamos implementando
         * 2 - É  tabela que armazena os registros do relacionamento
         * 3 - Representa o nome da FK da tabela mapeada pelo modelo da tabela de relacionamento
         * 4 - Representa o nome da FK da tabela mapeamento pelo model utilizado no relacionamento que estamos implementando
         */
    }
}

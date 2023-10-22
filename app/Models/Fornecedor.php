<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    //sobrescreve o nome padrão da tabela 'fornecedors'
    protected $table    = 'fornecedores';

    //permite que os atributos sejam criados como array
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() {
        //segundo e terceiro parametros não necessários
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id');
    }
}

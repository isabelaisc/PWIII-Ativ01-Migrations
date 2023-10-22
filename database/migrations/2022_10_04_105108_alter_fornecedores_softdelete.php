<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table seleciona uma tabela já criada no banco
        Schema::table('fornecedores', function (Blueprint $table) {
            //adiciona um campo chamado "deleted_at". os registros não serão excluídos, apenas inativados
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //para remover colunas
            // $table->dropColumn('uf');
            $table->dropSoftDeletes();
        });
    }
};

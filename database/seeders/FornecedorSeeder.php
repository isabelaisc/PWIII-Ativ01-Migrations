<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor.coim.br';
        $fornecedor->uf   = 'CE';
        $fornecedor->email = 'contato@fornecedor.com.br';
        $fornecedor->save();

        //atenção para o atributo fillable
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor.com.br',
            'uf'   => 'RS',
            'email'=> 'fornecedor@gmail.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor.com.br',
            'uf'   => 'SP',
            'email'=> 'contato@fornecedor.com.br'
        ]);
    }
}

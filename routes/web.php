<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//SERVE AS PÁGINAS EM RESPOSTA A REQUISIÇÕES
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])
     ->name('site.index')
     ->middleware('log.acesso');

Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class, 'principal'])
     ->name('site.sobrenos')
     ->middleware('log.acesso');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'principal'])
     ->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'principal'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

/**
 * As rotas abaixo da 'prefix' serão acessadas apenas com o /app precedendo a URI
 */
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
     Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])
          ->name('app.home');

     Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])
          ->name('app.sair');

     Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])
          ->name('app.fornecedor');

     Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])
          ->name('app.fornecedor.listar');

     Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])
          ->name('app.fornecedor.listar');

     Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])
          ->name('app.fornecedor.adicionar');

     Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])
          ->name('app.fornecedor.adicionar');

     Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])
          ->name('app.fornecedor.editar');

     Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])
          ->name('app.fornecedor.excluir');

     Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])
          ->name('app.produto');

     Route::resource('produto', \App\Http\Controllers\ProdutoController::class);
     Route::resource('produto-detalhe', \App\Http\Controllers\ProdutoDetalheController::class);
     Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
     Route::resource('pedido', \App\Http\Controllers\PedidoController::class);

     Route::get('pedido-produto/create/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
     Route::post('pedido-produto/store/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
     Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedidoId}', [\App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});



/**
 * {}  indica parâmetros que serão substituídos pelos nomes definidos no caminho da URL
 * {?} indica que o parâmetro é opcional
 */
Route::get(
    '/contato/{nome}/{categoriaId}', 
    function (
        string $nome = 'Desconhecido',
        int $categoriaId = 1
    ) {
        echo "Estamos aqui: " . $nome . " - " . $categoriaId;
    }

    //PROCESSA A ROTA APENAS CASO SEJA UM NÚMERO
)->where('categoriaId', '[0-9]+')
 ->where('nome', '[A-Za-z]+');


Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');


// --------------- REDIRECT ---------------- //
Route::get('/rota1', function() {
     return "Rota 1"; 
})->name('site.rota1');


/**
 * DUAS MANEIRAS DE REALIZAR REDIRECTS
 */
//Route::redirect('/rota2', '/rota1');
Route::get('/rota2', function() {
     return redirect()->route('site.rota1');
})->name('site.rota2');


Route::fallback(function() {
    echo 'A rota acessada não existe, <a href="'.route('site.index').'"> clique aqui </a>para ir para página inicial!';
});

/** verbo HTTP
 * 
 * GET
 * POST
 * PUT
 * PATCH
 * DELETE
 * OPTIONS
 */
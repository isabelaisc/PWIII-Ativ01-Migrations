@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')
{{-- DETERMINA QUAL O TRECHO DE HTML QUE OCUPARÁ A VARIÁVEL DE CONTEÚDO --}}
@section('conteudo')
    
<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        <p>ID do Pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>

        <div class="" style="width: 30%; margin-left: auto; margin-right: auto;">
            <h1>Itens do pedido</h1>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Data de inclusão do Item no pedido</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }} </td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }} </td>
                            <td>
                                <form id="form_{{$produto->pivot->id}}" method="post" action="{{route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedidoId' => $pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>                                
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                
            @endcomponent
        </div>
    </div>

</div>

@endsection
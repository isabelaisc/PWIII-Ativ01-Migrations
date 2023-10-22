<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>App Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>
    <body>
        @include('site.layouts._partials.topo')
        {{-- IMPRIME A VARIÁVEL DE CONTEÚDO --}}
        @yield('conteudo')
    </body>
</html>
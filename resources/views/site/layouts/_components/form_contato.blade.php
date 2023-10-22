<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    {{-- old() recupera o valor do input, caso haja algum erro na validação --}}
    <input name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}">
    @if ($errors->has('telefone'))
        {{ $errors->first('telefone') }}
    @endif
    <br>
    <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
    @if ($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$key}}" {{ old('motivo_contatos_id') == $key ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
        
    </select>
    @if ($errors->has('motivo_contatos_id'))
        {{ $errors->first('motivo_contatos_id') }}
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
        @if(old('mensagem') != '')
            {{ old('mensagem') }}
        @else Preencha aqui a sua mensagem @endif
    </textarea>
    @if ($errors->has('mensagem'))
        {{ $errors->first('memsagem') }}
    @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position: absolute; top: 0px; left: 0px; width: 100%; background: red;">
        
        @foreach($errors->all() as $erro)
            {{ $erro }} <br>
        @endforeach

    </div>
@endif
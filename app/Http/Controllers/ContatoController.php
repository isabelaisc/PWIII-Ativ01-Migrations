<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

use function Psy\debug;

class ContatoController extends Controller
{

    public function principal(Request $request) {
        //Salvando registro no banco
        // echo "<pre>"; print_r($request->all()); echo "</pre>";
        // echo "<pre>"; print_r($request->input('nome')); echo "</pre>";

        // $contato = new SiteContato();

        // $contato->fill($request->all());

        // $contato->save();

        
        $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request) {
        
        $regras = [
            'nome'           => 'required|min:3|max:40|unique:site_contatos',
            'telefone'       => 'required',
            'email'          => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem'       => 'required|max:2000'
        ];

        $feedback = [
            'nome.required'  => 'O nome precisa ser preenchido.',
            'nome.min'       => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max'       => 'O campo nome precisa ter no máximo 3 caracteres',
            'nome.unique'    => 'O nome informado já está em uso',
            'email.email'    => 'O email informado não é válido',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'required'       => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras,$feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }

}

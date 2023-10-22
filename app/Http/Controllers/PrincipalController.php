<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;


class PrincipalController extends Controller
{

    public function principal() {
        
        /**
         * BLADE é o motor de renderização do Laravel, que fará a interpretação da View para 
         * processar a página WEB
         */

        $motivo_contatos = MotivoContato::all();

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);

    }

}

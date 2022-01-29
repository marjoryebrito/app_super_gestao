<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteContato;

class ContatoController extends Controller
{

    public function salvar(Request $request){

        $request->validate([
            'nome'=> 'required',
            'telefone'=>'required',
            'email'=>'required',
            'motivo_contato'=>'required',
            'mensagem'=>'required'
        ]);

        //SiteContato::create($request->all());
    }

    public function contato(){



   /*  
    //Opção 1:

    $contato = new SiteContato();

    $contato->nome = $request->input('nome');
    $contato->telefone = $request->input('telefone');
    $contato->email = $request->input('email');
    $contato->motivo_contato = $request->input('motivo_contato');
    $contato->mensagem = $request->input('mensagem');

    $contato->save();*/

    //Opção 2:
    /*$contato = new SiteContato();
    $contato-> fill($request->all()); //necessário declarar $fillable no Model SiteContato
    $contato->save();*/

        return view('site.contato', ['titulo' => 'contato (teste)']);
    }
}

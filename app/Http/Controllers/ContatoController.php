<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteContato;
use \App\MotivoContato;

class ContatoController extends Controller
{

    public function salvar(Request $request){

        $request->validate([
            'nome'=> 'required|min:3|max:40', // Nomes com no min 3 caracteres e no máx 40.

            'telefone'=>'required',
            'email'=>'email|unique:site_contatos',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required'
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

    public function contato(){

        $motivos_contato = MotivoContato::all();

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

        return view('site.contato', ['titulo' => 'contato (teste)', 'motivos_contato'=>$motivos_contato]);
    }
}

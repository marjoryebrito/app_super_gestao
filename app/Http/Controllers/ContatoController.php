<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteContato;
use \App\MotivoContato;

class ContatoController extends Controller
{

    public function salvar(Request $request){



        $regras =[
            'nome'=> 'required|min:3|max:40', // Nomes com no min 3 caracteres e no máx 40.
            'telefone'=>'required',
            'email'=>'email|unique:site_contatos',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido.',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O capo nome precisa ter no máximo 40 caracteres.',
            'telefone.required' => 'O campo telefone precisa ser preenchido.',
            'email.email' => 'Insira um e-mail válido.',
            'email.unique' => 'O e-mail informado já está em uso.',
            'motivo_contatos_id.required' => 'Selecione o motivo do contato.',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido.',

            'required' => 'O campo :attribute precisa ser preenchido.'
        ];

        $request->validate($regras, $feedback);

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

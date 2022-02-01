<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedores;

class FornecedorController extends Controller
{
    public function index(){

        
        return view('app.fornecedor.index');
       

    }

    public function listar(){

        
        return view('app.fornecedor.listar');
       

    }

    public function adicionar(Request $request){

        $msg= '';

        if($request->input('_token') != ''){

            $regras = [
                'nome' => 'required|min: 3|max: 40',
                'site'=> 'required',
                'uf'=> 'required|min: 2|max: 2',
                'email'=> 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido.',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                'uf.min' => 'O campo UF deve ter no mínimo 3 caracteres.',
                'uf.max' => 'O campo UF deve ter no máximo 40 caracteres.',
                'email.email'=> 'Informe um e-mail válido.'
            ];

            $request->validate($regras, $feedback);

            //echo 'Até aqui nos ajudou o Senhor';

            $fornecedor = new Fornecedores();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso.';
        }
        


        return view('app.fornecedor.adicionar', ['msg'=> $msg]);
       

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedores;

class FornecedorController extends Controller
{
    public function index(){

        
        return view('app.fornecedor.index');
       

    }

    public function listar(Request $request){


        $fornecedores = Fornecedores::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(2);
     

        return view('app.fornecedor.listar', ['fornecedores'=> $fornecedores, 'request'=>$request->all()]);
       

    }

    public function adicionar(Request $request){

        $msg= '';
        $titulo_pagina = 'Adicionar';

        //adição

        if($request->input('_token') != '' && $request->input('id') == ''){
            

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
        
        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $titulo_pagina = 'Editar';
            $fornecedor = Fornecedores::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso.';
            }else{
                $msg = 'Problemas ao atualizar fornecedor.';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'),'fornecedor'=> $fornecedor, 'titulo_pagina' => $titulo_pagina]);

        }

        return view('app.fornecedor.adicionar', ['msg'=> $msg, 'titulo_pagina' => $titulo_pagina]);
       

    }

    public function editar($id, $msg =''){
        
        $titulo_pagina = 'Editar';


        $fornecedor = Fornecedores::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor'=> $fornecedor, 'titulo_pagina' => $titulo_pagina, 'msg'=> $msg]);
    }

    public function excluir($id){
        Fornecedores::find($id)->delete();
        
        return redirect()->route('app.fornecedor');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha inválidos.';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário fazer login para acessar a página.';
        }

        return view('site.login', ['titulo'=> 'Login', 'erro'=>$erro]);
    }

    public function autenticar(Request $request){
        
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //feedback de validação

        $feedback = [
            'usuario.email' => 'Informe um e-mail válido.',
            'senha.required' => 'O campo senha precisa ser preenchido.'
        ];

        $request->validate($regras, $feedback);

        //Recuperando os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $existe = $user->where('email', $email)->where('password', $password)->get()->first();


        if(isset($existe->name)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['erro'=> 1]);
        }


    }


    public function sair(){
        echo 'sair';
    }

}

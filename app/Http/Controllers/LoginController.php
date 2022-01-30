<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo'=> 'Login']);
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
            echo 'Usuário existe';
        }else{
            echo 'Usuário não existe';
        }


    }
}

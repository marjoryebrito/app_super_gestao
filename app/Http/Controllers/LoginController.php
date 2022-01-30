<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        print_r($request->all());

    }
}

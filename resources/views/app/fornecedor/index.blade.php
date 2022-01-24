<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



@isset($fornecedores) 

Fornecedor: {{$fornecedores[0]['nome']}} <br/>

Status: {{$fornecedores[0]['status']}}<br/>

CNPJ: {{ $fornecedores[0]['cnpj'] ?? 'Dado não preenchido.' }}

Telefone: ({{ $fornecedores[0]['ddd'] ?? '' }}) {{ $fornecedores[0]['telefone'] ?? '' }}

@switch($fornecedores[0]['ddd'])
    @case ('11')
    São Paulo - SP
    @break;

    @case ('85')
    Fortaleza - CE
    @break;

    @case ('32')
    Juiz de Fora - MG
    @break;
    @default
    Estado não identificado.
@endswitch


<!--
$variável testado não estiver definida
ou
$variável testada possuir o valor null
-->

@endisset

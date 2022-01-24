<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



@isset($fornecedores) 

Fornecedor: {{$fornecedores[1]['nome']}} <br/>

Status: {{$fornecedores[1]['status']}}<br/>

@isset($fornecedores[1]['cnpj'])
CNPJ: {{$fornecedores[1]['cnpj']}}<br/>
@endisset
@endisset

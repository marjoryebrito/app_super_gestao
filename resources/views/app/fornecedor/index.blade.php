<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



@isset($fornecedores) 

Fornecedor: {{$fornecedores[0]['nome']}} <br/>

Status: {{$fornecedores[0]['status']}}<br/>

@isset($fornecedores[0]['cnpj'])
CNPJ: {{$fornecedores[0]['cnpj']}}
    @empty($fornecedores[0]['cnpj'])
        - Vazio
    @endempty    
@endisset
@endisset

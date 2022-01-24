<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



Fornecedor: {{$fornecedores[0]['nome']}} <br/>
Status: {{$fornecedores[0]['status']}}<br/>

@unless($fornecedores[0]['status'] == 'S')
    Fornecedor inativo
@endunless    

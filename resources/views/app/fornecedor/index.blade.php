<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



@isset($fornecedores) 
@forelse($fornecedores as $indice => $fornecedor)
Fornecedor: {{$fornecedor['nome']}} <br/>

Status: {{$fornecedor['status']}}<br/>

CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido.' }}

Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
<hr>
@empty
    Não existem fornecedores cadastrados!!!
@endforelse
@endisset

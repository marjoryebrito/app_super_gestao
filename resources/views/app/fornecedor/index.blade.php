<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do Blade --}}

@php

//enquanto o if() executa se o retirno for true



@endphp

{{-- O @unless executa se o retorno for false --}}



@isset($fornecedores) 

@for ($i = 0 ; isset($fornecedores[$i]); $i++)

Fornecedor: {{$fornecedores[$i]['nome']}} <br/>

Status: {{$fornecedores[$i]['status']}}<br/>

CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido.' }}

Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
<hr>
@endfor
@endisset

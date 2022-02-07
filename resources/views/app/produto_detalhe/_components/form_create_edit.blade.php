@if (isset($produto_detalhe_detalhe->id))
<form action="{{route('produto-detalhe.update', ['produto-detalhe'=>$produto_detalhe->id])}}" method="post">
    @csrf
    @method('PUT')
@else
 <form action="{{route('produto-detalhe.store')}}" method="post">
    @csrf
@endif
{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
<input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id?? old('produto_id')}}" placeholder="ID do Produto" class="borda-preta"/>

{{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}
<input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento" class="borda-preta"/>

{{$errors->has('largura') ? $errors->first('largura') : ''}}
<input type="number" name="largura" value="{{ $produto_detalhe->largura ?? old('largura')}}" placeholder="Largura" class="borda-preta"/>

{{$errors->has('altura') ? $errors->first('altura') : ''}}
<input type="number" name="altura" value="{{ $produto_detalhe->largura ?? old('altura')}}" placeholder="Altura" class="borda-preta"/>

{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
<select name="unidade_id" >
    <option value="">--Selecione--</option>

    @foreach ($unidades as $unidade)
        <option value="{{$unidade->id}}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
    @endforeach

    
</select>

<button type="submit" class="borda-preta">Cadastrar</button>
</form>

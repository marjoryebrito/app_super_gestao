
 <form action="{{route('pedido-produto.store', ['pedido'=>$pedido])}}" method="post">
    @csrf

{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
<select name="produto_id" >
    <option value="">--Selecione um Produto--</option>

    @foreach ($produtos as $produto)
        <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
    @endforeach

    
</select>



<button type="submit" class="borda-preta">Cadastrar</button>
</form>

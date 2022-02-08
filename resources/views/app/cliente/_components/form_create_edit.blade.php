@if (isset($cliente->id))
<form action="{{route('cliente.update', ['cliente'=>$cliente->id])}}" method="post">
    @csrf
    @method('PUT')
@else
 <form action="{{route('cliente.store')}}" method="post">
    @csrf
@endif


{{$errors->has('nome') ? $errors->first('nome') : ''}}
<input type="text" name="nome" value="{{ $cliente->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta"/>



<button type="submit" class="borda-preta">Cadastrar</button>
</form>

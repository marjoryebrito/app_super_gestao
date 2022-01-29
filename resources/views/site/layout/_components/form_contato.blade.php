{{$slot}} {{--variável que tem os dados passados pelo @component na view--}}
<form action="{{ route('site.contato') }}" method="post">
@csrf
    <input name="nome" value="{{ old('name')}}" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivos_contato as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
        
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}">@if(old('mensagem') != ''){{ old('mensagem') }}@else Preencha aqui a sua mensagem @endif</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
@extends('app.layout.basico')

@section('titulo', 'Produtos, pedido.')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
       
        <p>Adicionar Produtos ao Pedido</p>
       
       
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <h4>Detalhes do pedido:</h4> <br>
            <p>ID do Pedido:  {{$pedido->id}}</p>      
            <p>Cliente:  {{$pedido->cliente_id}}</p> 

        <div style="width:30%; margin-left:auto; margin-right:auto;">

            <h4>Itens do pedido</h4>
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Inclusão do Item no Pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->created_at->format('d/m/y')}}</td>
                                <td>
                                    <form action="{{ route('pedido-produto.destroy', ['pedidoProduto'=>$produto->pivot->id, 'pedido_id'=>$pedido->id])}}" method="post" id="form_{{$produto->pivot->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id').submit()">Excluir</a>
                                     </form>
                                    </td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            @component('app.pedido_produto._components.form_create', ['pedido'=>$pedido, 'produtos'=>$produtos])
               
           @endcomponent
            
        </div>
    </div>
</div>

@endsection
@extends ('layout')


@section('cabecalho')
Livros
@endsection


@section('conteudo')

<a href="/home" ><h3>Home</h3></a>
<ul class='list-group'>

    @if(!empty($mensagem))
        <div class='alert alert-success'>
            {{$mensagem}}
        </div>
    @endif

    @if(!empty($mensagemRegistroApagado))
    <div class='alert alert-success'>
            {{$mensagemRegistroApagado}}
        </div>
    @endif
    
    @foreach($livros as $livro)
        <li class='list-group-item'>
            {{ $livro->nome }}
            <form method='post' action="/livros/{{ $livro->id }}" 
                  onsubmit='return confirm("Tem certeza que deseja remover {{ $livro->nome }}?")'>
                @csrf
                <button class='btn btn-danger'>Excluir</button>
            </form>
        </li>
    @endforeach
</ul>
<form method='post' action="/livros/esvaziar/">
    @csrf
    <a href="{{route ('viewAdicionaLivro')}}" class='btn btn-dark mt-3 mr-3'>Adicionar</a>
    <button class='btn btn-dark mt-3'>Esvaziar</button>
</form>
@endsection
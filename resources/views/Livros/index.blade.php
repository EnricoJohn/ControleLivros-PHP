@extends ('layout')


@section('cabecalho')
Livros
@endsection


@section('conteudo')

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

<a href="/home" ><h3>Home</h3></a>

<ul class='list-group'>
    @foreach($livros as $livro)
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            {{ $livro->nm_livro }}
            <form method='post' action="/livros/{{ $livro->id }}" 
                  onsubmit='return confirm("Tem certeza que deseja remover {{ $livro->nome }}?")'>
                @csrf
                @method('DELETE')
                <button class='btn btn-danger btn-sm'>Excluir</button>
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
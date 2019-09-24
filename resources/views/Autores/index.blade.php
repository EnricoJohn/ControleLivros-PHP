@extends('layout')

@section('cabecalho')
Autores
@endsection


@section('conteudo')

<div class="container">

<form method='post' action="{{ route('cadastra_autor') }}">
@csrf
<div class="row col col-12">
    <div class='col col-8'>
        <label for='autor'>Nome:</label>
        <input type="text" class='form-control' name='autor'>
    </div>
    <button href="{{ route('mostra_autores')}}" class='btn btn-dark mt-3 mr-3'>Adicionar</button>
</form>
</div>

<ul class='list-group mt-5'>
    @foreach($autores as $autor)
        <li class='list-group-item'>
            {{ $autor->nm_autor }}
            <form method='post' action="/autor/{{ $autor->id_autor }}" 
                  onsubmit='return confirm("Tem certeza que deseja remover {{ $autor->nm_autor }}?")'>
                @csrf
                <button class='btn btn-danger'>Excluir</button>
            </form>
        </li>
    @endforeach
</ul>


@endsection


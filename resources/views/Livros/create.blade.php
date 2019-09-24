@extends('layout')

@section('cabecalho')
Adicionar Livro

@endsection

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method='post' action="{{route('storeLivro')}}">
@csrf
<div class="row col col-12">
    <div class='col col-8'>
        <label for='nome_livro'>Nome:</label>
        <input type="text" class='form-control' name='nome_livro'>
    </div>
    <div class='col col-2 dropdown'>
        <div class="container">  
        <select name="autor">
        @foreach($autores as $autor)
            <option>        
                {{$autor->nm_autor}}
            </option>     
        @endforeach
        </select> 
        </div>
        
    </div>
    <div class='col col-2'>
        <label for='capitulos'>Nº de Capítulos:</label>
        <input type="number" class='form-control' name='capitulos'>
    </div>

    <button class='btn btn-dark mt-2 mr-4 ml-3' href="/livros/adicionar">Adicionar</button>    
    <a class='btn btn-dark mt-2' href='/livros'>Voltar</a>    
</div>
    <div class='form-group'>   
         
    </div>
</form>


@endsection
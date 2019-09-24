@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="livros mr-5">
                        <a class='btn btn-dark' href="/livros">Livros</a>
                    </div>
                    <div class="autores ml-5">
                        <a class='btn btn-dark' href="/autor">Autores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

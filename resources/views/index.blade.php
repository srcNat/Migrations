@extends('layouts.main')
@section('title',Livros')
@section('content')

    <h1>Livros recém adicionados</h1>

    @foreach ($Livros as $livro)
        <div class="card col-md-3">
            <img class="img-fluid" src="/img/books/{{ $livro-> Image }}" alt="{{ $livro-> Name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $Livros-> Name }}</h5>
                
                <a href="{{route('edit.blade',['livro'=> $Livros->id])}}" class="btn btn-primary">Editar</a>
                <a href="{{route('show.blade',['livro'=> $Livros->id])}}" class="btn btn-primary">Sobre</a>
                
                <form action="{{route('livro.destroy',['livro'=> $livros ->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
    @if(count($Livros)==0)
        <h3>O livro não foi adicionado</h3>
    @endif
    <p>Cadastre um <a href="{{route('create.blade')}}">livro</a></p>
@endsection
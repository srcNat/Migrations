@extends('layouts.main')
@section('title','Edit Livro')
@section('content')

<h1>Editar livro</h1>
<form action="{{route('livro.update',['livro'=> $Livros-> id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Imagem do Livro: </label>
        <input type="file" id="Image" name="Image" class="form-control-file" accept="image/png, image/jpeg" required>
    </div>
    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" class="form-control" id="Name" name="Name" placeholder="Nome do Livro" required value="{{$Livros-> Name}}">
    </div>
    <div class="form-group">
        <label for="title">Descrição</label>
        <textarea type="text" class="form-control" id="Description" name="Description" placeholder="Descrição Livro" required>
            {{$Livros-> Description}}
        </textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Livro">
</form>

@endsection
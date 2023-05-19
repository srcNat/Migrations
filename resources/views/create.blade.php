@extends('layouts.main')
@section('title','Cadastrar Livro')
@section('content')

<h1>Adicione o livro de sua escolha</h1>
<form action="{{route('livro.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">Imagem do Livro: </label>
        <input type="file" id="Image" name="Image" class="form-control-file" accept="image/png, image/jpeg" required>
    </div>
    <div class="form-group">
        <label for="title">Nome do Livro</label>
        <input type="text" class="form-control" id="Name" name="Name" placeholder="Nome do Livro" required>
    </div>
    <div class="form-group">
        <label for="title">Descrição</label>
        <textarea type="text" class="form-control" id="Description" name="Description" placeholder="Descrição Livro" required></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Adicionar Livro">
</form>

@endsection
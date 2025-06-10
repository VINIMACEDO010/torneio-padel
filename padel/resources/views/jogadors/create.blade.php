@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Jogador</h1>
    <form action="{{ route('jogadors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Jogador</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select name="genero" class="form-select" required>
                <option value="">Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="misto">Misto</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Torneio</h1>
    <form action="{{ route('torneios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Torneio</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select name="categoria" class="form-select" required>
                <option value="">Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="misto">Misto</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="max_participantes" class="form-label">Máx. Participantes</label>
            <input type="number" name="max_participantes" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection

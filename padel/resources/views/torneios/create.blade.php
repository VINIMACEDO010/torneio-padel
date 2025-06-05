@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Torneio</h1>
    <form action="{{ route('torneios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Torneio</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
</div>
@endsection

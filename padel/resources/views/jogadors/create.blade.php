@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Jogador</h1>
    <form action="{{ route('jogadors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Jogador</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
</div>
@endsection

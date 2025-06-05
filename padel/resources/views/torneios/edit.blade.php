@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Torneio</h1>
    <form action="{{ route('torneios.update', $torneio) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome do Torneio</label>
            <input type="text" name="nome" class="form-control" value="{{ $torneio->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
    </form>
</div>
@endsection

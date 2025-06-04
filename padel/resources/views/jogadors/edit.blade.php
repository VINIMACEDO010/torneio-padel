@extends('layouts.app')

@section('content')
    <h2>Editar Jogador</h2>
    <form action="{{ route('jogadors.update', $jogador->id) }}" method="POST">
        @csrf @method('PUT')
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $jogador->nome }}" required>
        <button type="submit">Atualizar</button>
    </form>
@endsection

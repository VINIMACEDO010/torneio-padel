@extends('layouts.app')

@section('content')
    <h2>Novo Jogador</h2>
    <form action="{{ route('jogadors.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <button type="submit">Salvar</button>
    </form>
@endsection

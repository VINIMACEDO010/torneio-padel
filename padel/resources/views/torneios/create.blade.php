@extends('layouts.app')

@section('content')
    <h2>Novo Torneio</h2>
    <form action="{{ route('torneios.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Data Início:</label>
        <input type="date" name="data_inicio" required>
        <label>Data Fim:</label>
        <input type="date" name="data_fim" required>
        <button type="submit">Criar</button>
    </form>
@endsection

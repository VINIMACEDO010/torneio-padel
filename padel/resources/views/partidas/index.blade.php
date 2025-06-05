@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Partidas</h1>
    <a href="{{ route('partidas.create') }}" class="btn btn-primary mb-3">Nova Partida</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jogador 1</th>
                <th>Jogador 2</th>
                <th>Sets Jogador 1</th>
                <th>Sets Jogador 2</th>
                <th>Torneio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidas as $partida)
                <tr>
                    <td>{{ $partida->jogador1->nome }}</td>
                    <td>{{ $partida->jogador2->nome }}</td>
                    <td>{{ $partida->sets_jogador1 }}</td>
                    <td>{{ $partida->sets_jogador2 }}</td>
                    <td>{{ $partida->torneio->nome }}</td>
                    <td>
                        <a href="{{ route('partidas.edit', $partida) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('partidas.destroy', $partida) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
    {{ $jogadores->links() }} {{-- ou $torneios / $partidas dependendo da view --}}
</div>

</div>
@endsection

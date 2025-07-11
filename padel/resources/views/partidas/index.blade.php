@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Partidas</h1>
    <a href="{{ route('partidas.create') }}" class="btn btn-primary mb-3">Nova Partida</a>

    @if($partidas->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Torneio</th>
                    <th>Jogador 1</th>
                    <th>Jogador 2</th>
                    <th>Resultado</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partidas as $partida)
                    <tr>
                        <td>{{ $partida->torneio->nome }}</td>
                        <td>{{ $partida->jogador1->nome }}</td>
                        <td>{{ $partida->jogador2->nome }}</td>
                        <td>{{ $partida->resultado ?? '-' }}</td>
                        <td>{{ $partida->data_partida ? \Carbon\Carbon::parse($partida->data_partida)->format('d/m/Y H:i') : '-' }}</td>
                        <td>
                            <a href="{{ route('partidas.edit', $partida) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('partidas.destroy', $partida) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir a partida?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $partidas->links() }}
        </div>
    @else
        <div class="alert alert-info">Nenhuma partida cadastrada.</div>
    @endif
</div>
@endsection

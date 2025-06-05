@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Partidas</h1>

    <a href="{{ route('torneios.gerarPartidas', $torneio->id) }}" class="btn btn-sm btn-outline-primary">Gerar Partidas</a>

    @if ($partidas->count())
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Torneio</th>
                    <th>Jogador 1</th>
                    <th>Jogador 2</th>
                    <th>Resultado</th>
                    <th>Data da Partida</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidas as $partida)
                    <tr>
                        <td>{{ $partida->id }}</td>
                        <td>{{ $partida->torneio->nome }}</td>
                        <td>{{ $partida->jogador1->nome }}</td>
                        <td>{{ $partida->jogador2->nome }}</td>
                        <td>{{ $partida->resultado ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($partida->data_partida)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('partidas.edit', $partida->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('partidas.destroy', $partida->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta partida?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $partidas->links() }}
        </div>
    @else
        <div class="alert alert-info">
            Nenhuma partida cadastrada.
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Torneios</h1>
    <a href="{{ route('torneios.create') }}" class="btn btn-primary mb-3">Novo Torneio</a>

    @if($torneios->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Máx. Participantes</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($torneios as $torneio)
                    <tr>
                        <td>{{ $torneio->nome }}</td>
                        <td>{{ ucfirst($torneio->categoria) }}</td>
                        <td>{{ $torneio->max_participantes }}</td>
                        <td>
                            <a href="{{ route('torneios.gerarPartidas', $torneio->id) }}" class="btn btn-sm btn-success">Gerar Partidas</a>
                            <form action="{{ route('torneios.destroy', $torneio) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir o torneio?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Nenhum torneio cadastrado.</div>
    @endif
</div>
@endsection

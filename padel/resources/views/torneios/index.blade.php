@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Torneios</h1>

    <form method="GET" action="{{ route('torneios.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar torneio" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <a href="{{ route('torneios.create') }}" class="btn btn-success mb-3">Novo Torneio</a>

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
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $torneios->appends(['search' => request('search')])->links() }}
    @else
        <div class="alert alert-info">Nenhum torneio cadastrado.</div>
    @endif
</div>
@endsection

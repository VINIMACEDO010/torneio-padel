@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Jogadores</h1>

    <form method="GET" action="{{ route('jogadors.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar jogador" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <a href="{{ route('jogadors.create') }}" class="btn btn-success mb-3">Novo Jogador</a>

    @if($jogadores->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jogadores as $jogador)
                    <tr>
                        <td>{{ $jogador->nome }}</td>
                        <td>{{ ucfirst($jogador->genero) }}</td>
                        <td>
                            <a href="{{ route('jogadors.edit', $jogador) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('jogadors.destroy', $jogador) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $jogadores->appends(['search' => request('search')])->links() }}
    @else
        <div class="alert alert-info">Nenhum jogador cadastrado.</div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Torneios</h1>
    <a href="{{ route('torneios.create') }}" class="btn btn-primary mb-3">Novo Torneio</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($torneios as $torneio)
                <tr>
                    <td>{{ $torneio->nome }}</td>
                    <td>
                        <a href="{{ route('torneios.edit', $torneio) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('torneios.show', $torneio) }}" class="btn btn-info btn-sm">Ver</a>
                        <form action="{{ route('torneios.destroy', $torneio) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                        <a href="{{ url('/torneios/' . $torneio->id . '/gerar-partidas') }}" class="btn btn-success btn-sm">Gerar Partidas</a>
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

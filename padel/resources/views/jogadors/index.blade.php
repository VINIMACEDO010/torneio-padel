@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Jogadores</h1>
    <a href="{{ route('jogadors.create') }}" class="btn btn-primary mb-3">Novo Jogador</a>

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
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $jogadores->links() }}
        </div>
    @else
        <div class="alert alert-info">Nenhum jogador cadastrado.</div>
    @endif
</div>
@endsection

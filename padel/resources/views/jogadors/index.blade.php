@extends('layouts.app')

@section('content')
    <h2>Jogadores</h2>
    <a href="{{ route('jogadors.create') }}">Cadastrar Jogador</a>
    <ul>
        @foreach($jogadores as $jogador)
            <li>
                {{ $jogador->nome }}
                <a href="{{ route('jogadors.edit', $jogador->id) }}">Editar</a>
                <form action="{{ route('jogadors.destroy', $jogador->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

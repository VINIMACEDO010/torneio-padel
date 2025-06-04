@extends('layouts.app')

@section('content')
    <h2>Torneios</h2>
    <a href="{{ route('torneios.create') }}">Criar Torneio</a>
    <ul>
        @foreach($torneios as $torneio)
            <li>
                {{ $torneio->nome }} ({{ $torneio->data_inicio }} - {{ $torneio->data_fim }})
                <form action="{{ route('torneios.gerarPartidas', $torneio->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Gerar Partidas</button>
                </form>
                <form action="{{ route('torneios.destroy', $torneio->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

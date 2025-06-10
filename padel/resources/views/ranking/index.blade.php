@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ranking de Jogadores (Sets Vencidos)</h1>

    @if(count($ranking))
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Posição</th>
                    <th>Jogador</th>
                    <th>Sets Vencidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ranking as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['jogador'] }}</td>
                        <td>{{ $item['sets_vencidos'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Nenhuma partida registrada ainda.</div>
    @endif
</div>
@endsection

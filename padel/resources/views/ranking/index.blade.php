@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ranking de Jogadores (por Vitórias)</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Posição</th>
                <th>Jogador</th>
                <th>Vitórias</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}º</td>
                    <td>{{ $item['jogador'] }}</td>
                    <td>{{ $item['vitorias'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

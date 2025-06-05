@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ranking por Sets Vencidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Posição</th>
                <th>Nome do Jogador</th>
                <th>Sets Vencidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['jogador']->nome }}</td>
                    <td>{{ $item['sets_vencidos'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

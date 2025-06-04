@extends('layouts.app')

@section('content')
    <h2>Ranking por Sets Vencidos</h2>
    <table>
        <thead>
            <tr>
                <th>Jogador</th>
                <th>Total de Sets Vencidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $linha)
                <tr>
                    <td>{{ $linha->nome }}</td>
                    <td>{{ $linha->total_sets }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

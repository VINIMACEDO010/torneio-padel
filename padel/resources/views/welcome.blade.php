@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1 class="display-5">Bem-vindo ao Sistema de Torneio de Padel 🎾</h1>
        <p class="lead">Gerencie jogadores, torneios e partidas com facilidade!</p>
    </div>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <i class="bi bi-person display-4 text-primary"></i>
                    <h5 class="card-title mt-2">Jogadores</h5>
                    <p class="card-text">{{ \App\Models\Jogador::count() }} cadastrados</p>
                    <a href="{{ route('jogadors.index') }}" class="btn btn-primary">Visualizar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <i class="bi bi-trophy display-4 text-success"></i>
                    <h5 class="card-title mt-2">Torneios</h5>
                    <p class="card-text">{{ \App\Models\Torneio::count() }} ativos</p>
                    <a href="{{ route('torneios.index') }}" class="btn btn-success">Visualizar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning mb-3">
                <div class="card-body">
                    <i class="bi bi-controller display-4 text-warning"></i>
                    <h5 class="card-title mt-2">Partidas</h5>
                    <p class="card-text">{{ \App\Models\Partida::count() }} registradas</p>
                    <a href="{{ route('partidas.index') }}" class="btn btn-warning">Visualizar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

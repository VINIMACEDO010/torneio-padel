<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Torneio de Padel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Torneio de Padel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jogadors.index') }}"><i class="bi bi-person"></i> Jogadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('torneios.index') }}"><i class="bi bi-trophy"></i> Torneios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partidas.index') }}"><i class="bi bi-controller"></i> Partidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ranking.index') }}"><i class="bi bi-list-ol"></i> Ranking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Torneio de Padel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Torneio de Padel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

                        <a class="nav-link" href="{{ route('jogadors.index') }}">
                <i class="bi bi-person"></i> Jogadores
            </a>
            <a class="nav-link" href="{{ route('torneios.index') }}">
                <i class="bi bi-trophy"></i> Torneios
            </a>
            <a class="nav-link" href="{{ route('partidas.index') }}">
                <i class="bi bi-controller"></i> Partidas
            </a>

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

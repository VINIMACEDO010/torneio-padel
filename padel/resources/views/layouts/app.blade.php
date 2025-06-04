<!DOCTYPE html>
<html>
<head>
    <title>Torneio</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        a, button { margin: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('jogadors.index') }}">Jogadores</a>
        <a href="{{ route('torneios.index') }}">Torneios</a>
        <a href="{{ route('partidas.index') }}">Partidas</a>
        <a href="{{ route('ranking.sets') }}">Ranking</a>
    </nav>

    <hr>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @yield('content')
</body>
</html>

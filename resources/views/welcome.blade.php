<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagens</title>
</head>
<body>
    <h1>Upload de Imagens de Ultrassom</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="paciente_name">Nome do Paciente:</label>
            <input type="text" name="paciente_name" id="paciente_name" required>
        </div>
        <div>
            <label for="image">Imagem de Ultrassom:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit">Enviar</button>
    </form>

    <br>

    <h2>Visualizar Imagens</h2>
    <a href="{{ route('images.index') }}">
        <button>Ver Todas as Imagens</button>
    </a>
</body>
</html>
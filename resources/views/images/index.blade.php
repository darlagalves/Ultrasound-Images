<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagens de Ultrassom</title>
</head>
<body>
    <h1>Imagens de Ultrassom</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Nome do Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->paciente_name }}</td>
                    <td>{{ $image->image_name }}</td>
                    <td>
                        <a href="{{ route('images.show', $image->id) }}" target="_blank">
                            <button>Ver Imagem</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
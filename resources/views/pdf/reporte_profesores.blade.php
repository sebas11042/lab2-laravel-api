<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            height: 60px;
            margin-right: 20px;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            color: #0d47a1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #aaa;
        }
        th {
            background-color: #e0f0ff;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="header">
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/Logo_UCR.png'))) }}" alt="Logo UCR" style="height: 100px;">
        <div class="title">Profesores Siquirres</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->id }}</td>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->correo }}</td>
                    <td>{{ $profesor->especialidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

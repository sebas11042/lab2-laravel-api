<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cursos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 100px;
            margin-right: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #0d47a1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #dceefb;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/Logo_UCR.png'))) }}" alt="Logo UCR">
        <div class="title">Reporte de Cursos</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Créditos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->codigo }}</td>
                    <td>{{ $curso->creditos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

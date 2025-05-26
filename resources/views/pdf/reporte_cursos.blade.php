<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cursos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 80px;
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
            border: 1px solid #999;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e3f2fd;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #888;
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
                <th style="width: 5%;">ID</th>
                <th style="width: 25%;">Nombre</th>
                <th style="width: 15%;">Código</th>
                <th style="width: 10%;">Créditos</th>
                <th style="width: 25%;">Profesor</th>
                <th style="width: 20%;">Aula</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->codigo }}</td>
                    <td>{{ $curso->creditos }}</td>
                    <td>{{ $curso->profesor->nombre ?? 'Sin asignar' }}</td>
                    <td>{{ $curso->aula->nombre ?? 'Sin asignar' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado por el sistema - {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>

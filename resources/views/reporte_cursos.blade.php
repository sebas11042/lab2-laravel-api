<h2>Reporte de Cursos</h2>
<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Código</th>
      <th>Créditos</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cursos as $curso)
      <tr>
        <td>{{ $curso->id }}</td>
        <td>{{ $curso->nombre }}</td>
        <td>{{ $curso->codigo }}</td>
        <td>{{ $curso->creditos }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

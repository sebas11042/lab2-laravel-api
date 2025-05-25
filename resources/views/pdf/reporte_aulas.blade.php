<h2>Reporte de Aulas</h2>
<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Ubicación</th>
      <th>Capacidad</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($aulas as $aula)
      <tr>
        <td>{{ $aula->id }}</td>
        <td>{{ $aula->nombre }}</td>
        <td>{{ $aula->ubicacion }}</td>
        <td>{{ $aula->capacidad }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

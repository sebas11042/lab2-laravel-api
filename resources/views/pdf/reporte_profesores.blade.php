<h2>Reporte de Profesores</h2>
<table border="1" cellpadding="5" cellspacing="0">
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

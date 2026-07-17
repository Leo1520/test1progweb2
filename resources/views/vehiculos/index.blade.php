<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículos - Taller Automotriz</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f4f4; }
        h1 { color: #333; }
        .btn { padding: 8px 14px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn-primary { background: #007bff; color: #fff; }
        .btn-warning { background: #ffc107; color: #212529; }
        .btn-danger { background: #dc3545; color: #fff; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px 12px; text-align: left; }
        th { background: #343a40; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        .alert { padding: 12px 16px; border-radius: 4px; margin-bottom: 16px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <h1>Registro de Vehículos - Taller Automotriz</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">+ Nuevo Vehículo</a>

    @forelse($vehiculos as $vehiculo)
        @if($loop->first)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Placa</th>
                    <th>Color</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        @endif
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->propietario }}</td>
                    <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este vehículo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
        @if($loop->last)
            </tbody>
        </table>
        @endif
    @empty
        <p style="margin-top:20px; color:#666;">No hay vehículos registrados.</p>
    @endforelse
</body>
</html>

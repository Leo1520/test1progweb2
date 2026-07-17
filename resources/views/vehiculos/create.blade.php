<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f4f4; }
        h1 { color: #333; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 4px; font-weight: bold; color: #555; }
        input[type="text"], input[type="number"] {
            width: 100%; max-width: 400px; padding: 8px 10px;
            border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;
        }
        .error { color: #dc3545; font-size: 13px; margin-top: 4px; }
        .btn { padding: 9px 18px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; text-decoration: none; }
        .btn-success { background: #28a745; color: #fff; }
        .btn-secondary { background: #6c757d; color: #fff; }
        .card { background: #fff; padding: 24px; border-radius: 6px; max-width: 460px; box-shadow: 0 1px 4px rgba(0,0,0,.1); }
    </style>
</head>
<body>
    <h1>Registrar Nuevo Vehículo</h1>

    <div class="card">
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" value="{{ old('marca') }}" placeholder="Toyota, Honda, Ford...">
                @error('marca') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" placeholder="Corolla, Civic...">
                @error('modelo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="anio">Año</label>
                <input type="number" id="anio" name="anio" value="{{ old('anio') }}" placeholder="2020" min="1900" max="2100">
                @error('anio') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" id="placa" name="placa" value="{{ old('placa') }}" placeholder="ABC-1234">
                @error('placa') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" value="{{ old('color') }}" placeholder="Rojo, Azul...">
                @error('color') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="propietario">Propietario</label>
                <input type="text" id="propietario" name="propietario" value="{{ old('propietario') }}" placeholder="Nombre completo">
                @error('propietario') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar Vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary" style="margin-left:8px;">Cancelar</a>
        </form>
    </div>
</body>
</html>

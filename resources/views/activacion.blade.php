<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Activación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Formulario de Activación</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('activacion.procesar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="regional" class="form-label">Regional</label>
                <input type="text" class="form-control" id="regional" name="regional" required>
            </div>
            <div class="mb-3">
                <label for="primer_nombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
            </div>
            <div class="mb-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
            </div>
            <div class="mb-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
            </div>
            <div class="mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
            </div>
            <div class="mb-3">
                <label for="correo_personal" class="form-label">Correo Personal</label>
                <input type="email" class="form-control" id="correo_personal" name="correo_personal" required>
            </div>
            <div class="mb-3">
                <label for="correo_institucional" class="form-label">Correo Institucional (@sena.edu.co)</label>
                <input type="email" class="form-control" id="correo_institucional" name="correo_institucional" required>
            </div>
            <div class="mb-3">
                <label for="numero_contrato" class="form-label">Número de Contrato</label>
                <input type="text" class="form-control" id="numero_contrato" name="numero_contrato" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio_contrato" class="form-label">Fecha de Inicio del Contrato</label>
                <input type="date" class="form-control" id="fecha_inicio_contrato" name="fecha_inicio_contrato" required>
            </div>
            <div class="mb-3">
                <label for="fecha_terminacion_contrato" class="form-label">Fecha de Terminación del Contrato</label>
                <input type="date" class="form-control" id="fecha_terminacion_contrato" name="fecha_terminacion_contrato" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="nemotecnia" class="form-label">Nemotecnia</label>
                <input type="text" class="form-control" id="nemotecnia" name="nemotecnia" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
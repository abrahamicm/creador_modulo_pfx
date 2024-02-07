<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generador de Módulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Verificar si la constante MY_APP no está definida
if (!defined('MY_APP')) {
    define('MY_APP', true);
}
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Generador de Módulo</h2>
            
            <form method="post" action="procesar_formulario.php">
                <div class="mb-3">
                    <label for="moduleName" class="form-label">Nombre del Módulo:</label>
                    <input type="text" class="form-control" id="moduleName" name="moduleName" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Autor:</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Generar Módulo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

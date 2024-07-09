<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genero</title>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>
    <br><br><br><br>
    <div class="container">
    <form action="genero_guardar.php" method="post">
        <h1>Registrar Genero</h1>
        <label class="form-label" for="nombre_genero">Nombre del Genero:</label>
        <input class="form-control mayuscula" type="text" name="nombre_genero" id="nombre_genero" required>
        
        <div class="botones-container">
            <button class="btn btn-warning" type="reset">LIMPIAR</button>
            <button class="btn btn-success" type="submit">GUARDAR</button>
        </div>
    </form>

</body>

</html>
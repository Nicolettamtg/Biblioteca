<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Editar Genero</title>
</head>

<body>

    <?php
    if (!isset($_GET["id"])) {//no se toca el id
        exit("no funciona");
    }
    $id = $_GET["id"];//tampoco se toca
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    $sentencia = $conexion->prepare("SELECT * FROM genero WHERE id_genero = ?;");
    $sentencia->execute([$id]);
    $genero = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($genero === FALSE) {
        echo '<div id="mensaje">
                <h2 class="error">¡ERROR!</h2>
                <p>No existe algún genero con ese ID.</p>
                    <div class="botones-container">
                        <button class="boton2" onclick="window.location.href=\'./genero_listado.php\'">Ver lista</button>
                    </div>
              </div>';
    } else {
    ?>
        <br><br><br><br>
        <div class="container">
        <form action="genero_editar.php" method="post">
            <h1>Editar Genero</h1>
            <input type="hidden" value="<?php echo $genero->id_genero ?>" name="id_genero">
            
            <label class="form-label">Nombre del Genero:</label>
            <input type="text" value="<?php echo $genero->nombre_genero ?>" name="nombre_genero" id="nombre_genero" class="form-control mayuscula">
            
            <div class="botones-container">
                <button class="btn btn-dark" type="button" onclick="history.back();">CANCELAR</button>
                <button class="btn btn-success" type="submit">EDITAR</button>
            </div>
        </form>
    <?php } ?>


</body>

</html>
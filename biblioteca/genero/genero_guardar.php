<?php
if (!isset($_POST["nombre_genero"]))   {
    exit("algo fallooo");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$nombre_genero = strtoupper($_POST["nombre_genero"]);


$sentencia = $conexion->prepare("INSERT INTO genero (nombre_genero) VALUES (?);");
$resultado = $sentencia->execute([$nombre_genero]);

if ($resultado === TRUE) {
    $mensaje = "El Genero fue agregado correctamente.";
} else {
    $mensaje = "Algo salió mal. Por favor verifica que la tabla exista";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>

<body>
    <div id="mensaje">
        <h2><?php echo $mensaje; ?></h2>
        <br>
        <?php if ($resultado === TRUE) { ?>
            <button class="boton2" onclick="window.location.href='./genero_frm.php'">Atrás</button>
            <button class="boton1" onclick="window.location.href='./genero_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
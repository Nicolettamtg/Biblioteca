<?php
if (!isset($_GET["id"])) { //no se cambia esta id
    exit("algo anda mal !!!!1");
}

$id = $_GET["id"];//no se cambia la id
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$sentencia = $conexion->prepare("DELETE FROM genero WHERE id_genero = ?;");
$resultado = $sentencia->execute([$id]);//se queda como esta la id

if ($resultado === TRUE) {
    $mensaje = "Genero eliminado correctamente.";
} else {
    $mensaje = "Algo salió mal";
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
            <button class="boton1" onclick="window.location.href='./genero_listado.php'">Volver a la lista</button>
        <?php } ?>
    </div>
</body>

</html>
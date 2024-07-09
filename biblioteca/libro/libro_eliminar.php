<?php
if (!isset($_GET["id"])) {//esta oarte del id no se cambia
    exit("algo anda mal !!!! ");
}

$id = $_GET["id"];//este tambien se mantiende
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$sentencia = $conexion->prepare("DELETE FROM libro WHERE id_libro = ?;");
$resultado = $sentencia->execute([$id]);//se mantiene el id sin editar

if ($resultado === TRUE) {
    $mensaje = "El libro fue eliminado correctamente.";
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
            <button class="boton1" onclick="window.location.href='./libro_listado.php'">Volver a la lista</button>
        <?php } ?>
    </div>
</body>

</html>
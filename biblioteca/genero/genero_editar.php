<?php
if (!isset($_POST["id_genero"]) ||
 !isset($_POST["nombre_genero"]) ) {
    exit("hay una fallaaaa");
}


include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$id_genero = $_POST["id_genero"];
$nombre_genero = strtoupper($_POST["nombre_genero"]);

$sentencia = $conexion->prepare("UPDATE genero SET nombre_genero=? WHERE id_genero=?;");
$resultado = $sentencia->execute([$nombre_genero, $id_genero]);

if ($resultado === TRUE) {
    $mensaje = "Actualizado correctamente.";
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
            <button class="btn btn-warning" onclick="window.location.href='./genero_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
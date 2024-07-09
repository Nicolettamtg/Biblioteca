<?php
if (!isset($_POST["id_autor"]) ||
 !isset($_POST["nombre_autor"]) || 
 !isset($_POST["id_pais"]) ) {
    exit("esta maaal y no llegan datos");
}


include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$id_autor = $_POST["id_autor"];
$nombre_autor = strtoupper($_POST["nombre_autor"]);
$id_pais = $_POST["id_pais"];


$sentencia = $conexion->prepare("UPDATE autor SET nombre_autor=?, id_pais=? WHERE id_autor=?;");
$resultado = $sentencia->execute([$nombre_autor, $id_pais, $id_autor]);

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
            <button class="boton1" onclick="window.location.href='./autor_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
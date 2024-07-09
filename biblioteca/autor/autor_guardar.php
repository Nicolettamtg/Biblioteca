<?php
if (!isset($_POST["nombre_autor"]) ||
    
    !isset($_POST["id_pais"]))   {
    exit("algo fallooo");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$nombre_autor = strtoupper($_POST["nombre_autor"]);
$nacimiento = ($_POST["nacimiento"]);
$idpais = $_POST["id_pais"];


$sentencia = $conexion->prepare("INSERT INTO autor (nombre_autor, nacimiento, id_pais) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre_autor, $nacimiento, $idpais]);

if ($resultado === TRUE) {
    $mensaje = "El Autor agregado correctamente.";
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
            <button class="btn btn-dark" onclick="window.location.href='./autor_frm.php'">Atrás</button>
            <button class="btn btn-warning" onclick="window.location.href='./autor_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
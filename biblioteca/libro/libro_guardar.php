<?php
if (!isset($_POST["titulo"]) ||
    !isset($_POST["id_autor"]) ||
    !isset($_POST["id_genero"]) ||
    !isset($_POST["edicion"]))   {
    exit("algo fallooo");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$titulo = strtoupper($_POST["titulo"]);
$id_autor = $_POST["id_autor"];
$id_genero = $_POST["id_genero"];
$edicion = $_POST["edicion"];



$sentencia = $conexion->prepare("INSERT INTO libro (titulo, id_autor, id_genero, edicion) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$titulo, $id_autor, $id_genero, $edicion]);

if ($resultado === TRUE) {
    $mensaje = "El Libro fue agregado correctamente.";
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
            <button class="boton2" onclick="window.location.href='./libro_frm.php'">Atrás</button>
            <button class="boton1" onclick="window.location.href='./libro_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
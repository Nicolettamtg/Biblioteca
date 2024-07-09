<!--aca solamente serian las claves foraneas, lo demas no-->
<?php
if (!isset($_POST["titulo"]) || 
    !isset($_POST["id_autor"]) || 
    !isset($_POST["id_genero"]) ||
    !isset($_POST["edicion"])
    ) 
    {
    exit("no llegan los datos");
}


include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
$id_libro = $_POST["id_libro"];
$titulo = strtoupper($_POST["titulo"]);
$id_autor = $_POST["id_autor"];
$id_genero = $_POST["id_genero"];
$edicion = $_POST["edicion"];



$sentencia = $conexion->prepare("UPDATE libro SET titulo=?, id_autor=?, id_genero=?, edicion=? WHERE id_libro=?;");
$resultado = $sentencia->execute([$titulo, $id_autor, $id_genero, $edicion, $id_libro]);

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
            <button class="boton1" onclick="window.location.href='./libro_listado.php'">Ver lista</button>
        <?php } ?>
    </div>
</body>

</html>
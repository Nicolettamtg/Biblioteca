<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Editar Autor</title>
</head>

<body>

    <?php
    if (!isset($_GET["id"])) { //no se toca esta parte
        exit("no funciona");
    }
    $id = $_GET["id"];
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    $sentencia = $conexion->prepare("SELECT autor.id_autor, autor.nombre_autor, pais.id_pais AS nombre_pais FROM autor JOIN pais ON pais.id_pais = autor.id_pais WHERE autor.id_autor=?;");


    $sentencia->execute([$id]); //no se cambia el id
    $autor = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($autor === FALSE) {
        echo '<div id="mensaje">
                <h2 class="error">¡ERROR!</h2>
                <p>No existe algún autor con ese ID.</p>
                    <div class="botones-container">
                        <button class="boton2" onclick="window.location.href=\'./autor_listado.php\'">Ver lista</button>
                    </div>
              </div>';
    } else {
    ?>
        <div class="container">
            <br><br><br><br>
            <form action="autor_editar.php" method="post">
                <h1>Editar Autor</h1>
                <input type="hidden" value="<?php echo $autor->id_autor ?>" name="id_autor">


                <label class="form-label">Nombre del Autor:</label>
                <input type="text" value="<?php echo $autor->nombre_autor ?>" name="nombre_autor" id="nombre_autor" class="form-control mayuscula">
                
                <!--llama a la clasve foranea-->
                <label class="form-label" for="pais">Pais:</label>
                <div>
                    <select class="form-select" name="id_pais" id="id_pais" required>
                        <option value=''>--- Seleccione un pais ---</option>
                        <?php
                        include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                        $sentencia = $conexion->query("SELECT * FROM pais ORDER BY nombre_pais ASC;");
                        $paises = $sentencia->fetchAll(PDO::FETCH_OBJ);
                        foreach ($paises as $pais) {
                            echo "<option value='" . $pais->id_pais . "'>" . $pais->nombre_pais . "</option>";
                        }
                        ?>
                    </select>
                    <div class="botones-container">
                        <button class="btn btn-dark" type="button" onclick="history.back();">CANCELAR</button>
                        <button class="btn btn-success" type="submit">EDITAR</button>
                    </div>
            </form>

        </div>
    <?php } ?>


</body>

</html>
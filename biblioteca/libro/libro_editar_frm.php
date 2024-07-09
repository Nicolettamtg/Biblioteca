<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
</head>

<body>

    <?php
    if (!isset($_GET["id"])) {//no se toca esta parte
        exit("no funciona");
    }
    $id = $_GET["id"];//este tampoco se cambia
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    
    
    $sentencia = $conexion->prepare("SELECT libro.id_libro, libro.titulo, libro.edicion, autor.nombre_autor AS nombre_autor, genero.nombre_genero AS nombre_genero FROM libro JOIN autor ON autor.id_autor = libro.id_autor JOIN genero ON genero.id_genero = libro.id_genero WHERE libro.id_libro=?;");


    $sentencia->execute([$id]);//no se cambia el id
    $libro = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($libro === FALSE) {
        echo '<div id="mensaje">
                <h2 class="error">¡ERROR!</h2>
                <p>No existe algún libro con ese ID.</p>
                    <div class="botones-container">
                        <button class="boton2" onclick="window.location.href=\'./libro_listado.php\'">Ver lista</button>
                    </div>
              </div>';
    } else {
    ?>
        <br><br><br><br>
        <div class="container">
        <form action="libro_editar.php" method="post">
            <h1>Editar Libro</h1>
            <input type="hidden" value="<?php echo $libro->id_libro ?>" name="id_libro">
            

            <label class="form-label">Titulo:</label>
            <input type="text" value="<?php echo $libro->titulo ?>" name="titulo" id="titulo" class="form-control mayuscula">


            <!--llama a la clave foranea-->
            <label class="form-label" for="autor">Autor:</label>
            <div>
                <select class="form-select" name="id_autor" id="id_autor" required>
                    <option value=''>--- Seleccione un autor ---</option>
                    <?php
                        include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                        $sentencia = $conexion->query("SELECT * FROM autor ORDER BY nombre_autor ASC;");
                        $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    
                        foreach ($autores as $autor) {
                            echo "<option value='" . $autor->id_autor . "'>" . $autor->nombre_autor . "</option>";
                        }
                    ?>
                </select>
            </div>

            <!--llama a la clave foranea-->
            <label class="form-label" for="genero">Genero:</label>
            <div>
                <select class="form-select" name="id_genero" id="id_genero" required>
                    <option value=''>--- Seleccione un genero ---</option>
                    <?php
                        include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                        $sentencia = $conexion->query("SELECT * FROM genero ORDER BY nombre_genero ASC;");
                        $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    
                        foreach ($generos as $genero) {
                            echo "<option value='" . $genero->id_genero . "'>" . $genero->nombre_genero . "</option>";
                        }
                    ?>
                </select>
            </div>

            <label class="form-label">AÑO DE EDICION:</label>
            <input type="number" value="<?php echo $libro->edicion ?>" name="edicion" id="edicion" class="form-control mayuscula">


            <div class="botones-container">
                <button class="btn btn-dark" type="button" onclick="history.back();">CANCELAR</button>
                <button class="btn btn-success" type="submit">EDITAR</button>
            </div>
        </form>
    <?php } ?>


</body>

</html>
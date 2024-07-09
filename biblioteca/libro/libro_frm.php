<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro</title>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>
    <br><br><br><br>
    <div class="container">
    <form action="libro_guardar.php" method="post">
        <h1>Registrar Libro</h1>
        <label class="form-label" for="titulo">Titulo:</label>
        <input class="form-control mayuscula" type="text" name="titulo" id="titulo" required>


        <!--llama a la clave foranea del autor-->
        <label class="form-label" for="autor">Autor:</label>
        <div>
            <select class="form-select" name="id_autor" id="id_autor" required>
                <option value=''>--- Seleccione el autor ---</option>
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


        <!--llama a la clave foranea del genero-->
        <label class="form-label" for="genero">Genero:</label>
        <div>
            <select class="form-select" name="id_genero" id="id_genero" required>
                <option value=''>--- Seleccione el genero ---</option>
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

        <label class="form-label" for="edicion">Año:</label>
        <input class="form-control" type="number" name="edicion" id="edicion" required>

        <div class="botones-container">
            <button class="btn btn-warning" type="reset">LIMPIAR</button>
            <button class="btn btn-success" type="submit">GUARDAR</button>
        </div>
    </form>

</body>

</html>
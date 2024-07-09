<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autor</title>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>
    <br><br><br><br>
    <div class="container">
    <form action="autor_guardar.php" method="post">
        <h1>Registrar Autor</h1>
        <label class="form-label" for="nombre_autor">Nombre del Autor:</label>
        <input class="form-control mayuscula" type="text" name="nombre_autor" id="nombre_autor" required>

        
        <label class="form-label" for="nacimiento">Nacimiento</label>
        <input class="form-control mayuscula" type="date" name="nacimiento" id="nacimiento" required>

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
        </div>


        <div class="botones-container">
            <button class="btn btn-danger" type="reset">LIMPIAR</button>
            <button class="btn btn-success" type="submit">GUARDAR</button>
        </div>
    </form>

</body>

</html>
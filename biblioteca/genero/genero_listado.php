<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LISTADO DE GENEROS</title>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>
    <br><br><br><br>
    <div class="container">
    <table>
        <thead>
            <caption>LISTADO DE GENEROS</caption>
            <tr>
                <th>ID</th>
                <th>GENERO</th>
                
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
            $sentencia = $conexion->query("SELECT * from genero ORDER BY nombre_genero ASC;");
            $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);

            if ($generos) {
                foreach ($generos as $genero) {
                    echo "<tr>";
                    echo "<td>" .  $genero->id_genero . "</td>";
                    echo "<td>" .  strtoupper($genero->nombre_genero) . "</td>";

                  

                    echo "<td><a href='genero_editar_frm.php?id=" . $genero->id_genero . "'class='boton_editar'>EDITAR</a></td>";
                    echo "<td><a href='genero_eliminar.php?id=" . $genero->id_genero . "'class='boton_eliminar'>ELIMINAR</a></td>";
                    echo "</tr>";
                }
            } else {
                echo '<div id="mensaje">
                		<h2 class="error">¡ERROR!</h2>
                		<p>No se encontraron resultados.</p>
                    	<div class="botones-container">
                        	<button class="boton2" onclick="window.location.href=\'./genero_listado.php\'">Ver lista</button>
                    	</div>
              		</div>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LISTADO DE AUTORES</title>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>
    <div class="container">
    <br><br><br><br>
    <table>
        <thead>
            <caption>LISTADO DE AUTORES</caption>
            <tr>
                <th>ID</th>
                <th>NOMBRE DEL AUTOR</th>        
                <th>NACIMIENTO</th>
                <th>PAIS</th>
                
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
                include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
            

                //un selec combinado entre dos tablas
				$sentencia = $conexion->query("SELECT a.id_autor, a.nombre_autor, a.nacimiento, p.nombre_pais FROM autor a INNER JOIN pais p ON a.id_pais = p.id_pais;");
				$autores = $sentencia->fetchAll(PDO::FETCH_OBJ);

                if (count($autores) > 0) {
                    foreach ($autores as $autor) {
                        echo "<tr>";
                        echo "<td>" .  $autor->id_autor . "</td>";
                        echo "<td>" .  strtoupper($autor->nombre_autor) . "</td>";
                        echo "<td>" .  strtoupper($autor->nacimiento) . "</td>";
                        echo "<td>" .  strtoupper($autor->nombre_pais) . "</td>";
                        echo "<td><a href='autor_editar_frm.php?id=" . $autor->id_autor . "'class='boton_editar'>EDITAR</a></td>";
                        echo "<td><a href='autor_eliminar.php?id=" . $autor->id_autor . "'class='boton_eliminar'>ELIMINAR</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="6">'; // colspan para ocupar todas las columnas de la tabla
                    echo '<div id="mensaje">';
                    echo '<h2 class="error">¡ERROR!</h2>';
                    echo '<p>No se encontraron resultados.</p>';
                    echo '<div class="botones-container">';
                    echo '<button class="boton2" onclick="window.location.href=\'./autor_frm.php\'">Registrar Autor</button>';
                    echo '</div>';
                    echo '</td>'; // cierre de la celda que ocupa todas las columnas
                    echo '</tr>';
                }
            ?>                
        </tbody>
    </table>
</body>

</html>
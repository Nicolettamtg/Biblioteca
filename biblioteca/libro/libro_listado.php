<?php
include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
?>
<br><br><br><br>
<div class="container">
    <table>
        <thead>

            <caption>LISTADO DE LIBROS</caption>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>AUTOR</th>
                <th>GENERO</th>
                <th>AÑO DE EDICION</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');

            //un selec combinado entre dos tablas
            //en esta sentencia hay que tener en cuneta el nombre para que pueda aparecer en el listado
            //join hace la cosulta de varias tablas en la base de datos
            $sentencia = $conexion->query("SELECT libro.id_libro, libro.titulo, libro.edicion, autor.nombre_autor AS nombre_autor, genero.nombre_genero AS nombre_genero FROM libro JOIN autor ON autor.id_autor = libro.id_autor JOIN genero ON genero.id_genero = libro.id_genero;");

            $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);

            if (count($libros) > 0) {
                foreach ($libros as $libro) {
                    echo "<tr>";
                    echo "<td>" .  $libro->id_libro . "</td>";
                    echo "<td>" .  strtoupper($libro->titulo) . "</td>";

                    //variable para que aparezca eñ nombre del autor 
                    echo "<td>" .  $libro->nombre_autor . "</td>";

                    //variable para que aparezca el nombre del genero 
                    echo "<td>" .  $libro->nombre_genero . "</td>";

                    echo "<td>" .  $libro->edicion . "</td>";

                    echo "<td><a href='libro_editar_frm.php?id=" . $libro->id_libro . "'class='boton_editar'>EDITAR</a></td>";
                    echo "<td><a href='libro_eliminar.php?id=" . $libro->id_libro . "'class='boton_eliminar'>ELIMINAR</a></td>";
                    echo "</tr>";
                }
            } else {
            ?>
                <div id="mensaje">
                    <h2 class="error">¡ERROR!</h2>
                    <p>No se encontraron resultados.</p>
                    <div class="botones-container">
                        <button class="boton2" onclick="window.location.href='libro_frm.php'">Registrar Libro</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
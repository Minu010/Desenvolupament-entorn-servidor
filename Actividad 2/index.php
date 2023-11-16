<?php 
session_start();
require("models/models.php");

$database = new Database();
$conexion = $database->conectar();

if ($conexion === null) {
    echo "Error de conexión a la base de datos.";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ESCUELA</title>
    </head>
    <body>
        <h1>ESCUELA</h1>
        <form action="./controllers/controllers.php" method="POST">
            <!-- NOMBRE -->
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombres"><br><br>

            <!-- APELLIDO -->
            <label for="apellido">Apellido:</label><br>
            <input type="text" name="apellidos"><br><br>

            <!-- DNI -->
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni"><br><br>

            <!-- CURSO -->
            <label for="curso">Curso:</label><br>
            <input type="text" name="cursos"><br><br>

            <!-- ENVIAR -->
            <input type="submit" value="Enviar" name="enviar"><br><br>

            <!-- MOSTRAR ALUMNOS REGISTRADOS-->
            <h2>MOSTRAR ALUMNOS REGISTRADOS</h2>
            <input type="submit" value="mostrar" name="mostrar">

            <!-- MOSTRAR CURSOS-->
            <h2>VER CURSOS</h2>
            <input type="submit" value="cursos" name="verCursos">
        </form> 

        <h2>CURSOS DISPONIBLES</h2>
        <?php 
        // Recuperar los cursos de la base de datos
        $showCursos = "SELECT * FROM cursos";
        $resultCursos = $conexion->query($showCursos);

        if ($resultCursos === false) {
            echo "Error al obtener resultados de la base de datos.";
        } else {
            ?>
            <table>
                <tr>
                    <th>nombre</th>
                    <th>Año</th>
                </tr>
                <?php
                // Mostrar los resultados en la tabla
                while($resultadoCurso = $resultCursos->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$resultadoCurso["nombre"]}</td>
                        <td>{$resultadoCurso["año"]}</td>
                    </tr>";
                }
                ?>
            </table>
            <?php
        }
        ?>
    </body>
    </html>
    <?php
}
?>
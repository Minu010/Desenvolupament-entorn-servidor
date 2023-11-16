<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar cursos</title>
</head>
<body>
    <?php 
    session_start();  // Asegúrate de iniciar la sesión
    require("../models/models.php");
    $database = new Database();
    $conexion = $database->conectar();

    if ($conexion === null) {
        echo "Error de conexión a la base de datos.";
    } else {
        $show = "SELECT * FROM cursos";
        $result = $conexion->query($show);

        if ($result === false) {
            echo "Error al obtener resultados de la base de datos.";
        } else {
            ?>
            <h1>CURSOS REGISTRADOS</h1>
            <table>
                <tr>
                    <th>nombre</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
                <?php
                while($resultado = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $resultado["nombre"]; ?></td>
                        <td><?php echo $resultado["año"]; ?></td>
                        <td>
                            <form action="../controllers/controllers.php" method="POST">
                                <input type="hidden" name="cursoId" value="<?php echo $resultado['id']; ?>">
                                <input type="submit" value="Eliminar" name="eliminarCurso">
                                <?php // header("Location: ../index.php"); ?>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        <?php
        }
    }
    ?>
</body>
</html>


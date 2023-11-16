<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar alumnos</title>
</head>
<body>
    <?php 
    

    // Verificar que la conexión se haya establecido correctamente
    require("../models/models.php");
    require("../controllers/controllers.php");
    $database = new Database();
    $conexion = $database->conectar();
    if ($conexion === null) {
        
        echo "Error de conexión a la base de datos.";
    } else {
        // Realizar la consulta SQL
        $show = "SELECT * FROM alumnos";
        $result = $conexion->query($show);

        /*if(else) */

        // Verificar que la consulta se haya ejecutado correctamente
        if ($result === false) {
            echo "Error al obtener resultados de la base de datos.";
        } else {
            ?>
            <h1>ALUMNOS REGISTRADOS</h1>
            <table>
                <tr>
                    <th>dni</th>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>cursos</th>
                </tr>
                <?php
                // Mostrar los resultados en la tabla
                while($resultado = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$resultado["dni"]}</td>
                        <td>{$resultado["nombres"]}</td>
                        <td>{$resultado["apellidos"]}</td>
                        <td>{$resultado["cursos"]}</td>
                    </tr>";
                }
                ?>
            </table>
        <?php
        }
    }
    ?>
</body>
</html>

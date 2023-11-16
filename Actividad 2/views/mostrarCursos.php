<?php
session_start();  // Asegúrate de iniciar la sesión
require("../models/models.php");

// Verificar que la conexión se haya establecido correctamente
$database = new Database();
$conexion = $database->conectar();

if ($conexion === null) {
    echo "Error de conexión a la base de datos.";
} else {
    // Realizar la consulta SQL
    $show = "SELECT * FROM cursos";
    $result = $conexion->query($show);

    // Verificar que la consulta se haya ejecutado correctamente
    if ($result === false) {
        echo "Error al obtener resultados de la base de datos.";
    } else {
        ?>
        <h1>CURSOS REGISTRADOS</h1>
        <table>
            <tr>
                <th>nombre</th>
                <th>Año</th>
            </tr>
            <?php
            // Mostrar los resultados en la tabla
            while($resultado = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$resultado["nombre"]}</td>
                    <td>{$resultado["ano"]}</td>
                </tr>";
            }
            ?>
        </table>
    <?php
    }
}
?>

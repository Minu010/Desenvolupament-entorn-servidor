<?php
require("../models/models.php");

// conexión a la bbdd
$database = new Database();
$conexion = $database->conectar();

if (isset($_POST["enviar"])) {
    if (empty($_POST["nombres"]) or empty($_POST["apellidos"]) or empty($_POST["dni"]) or empty($_POST["cursos"])) {
        // Si uno de los datos está vacío, enviará un mensaje de error
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        // El usuario ha enviado datos
        $nombre = $_POST["nombres"];
        $apellido = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $curso = $_POST["cursos"];

        // Ejecutar la consulta SQL para insertar datos en la base de datos
        $query = "INSERT INTO alumnos(dni, nombres, apellidos, cursos) VALUES ('$dni', '$nombre', '$apellido','$curso')";

        if ($conexion->query($query) === TRUE) {
            // Si todo es correcto, enviará un mensaje de éxito
            echo "$nombre ha sido registrado correctamente";
        } else {
            // En caso de error al ejecutar la consulta SQL, mostrar el mensaje de error
            echo '<div class="error">Error al registrar usuario: ' . $conexion->error . '</div>';
        }
    }
}

if (isset($_POST["mostrar"])) {
    // Verificar que la conexión se haya establecido correctamente
    if ($conexion === null) {
        echo "Error de conexión a la base de datos.";
    } else {
        $show = "SELECT * FROM alumnos";
        $result = $conexion->query($show);
        header("Location: ../views/alumnos.php");
    }
}

if (isset($_POST["enviarCursos"])) {
    if (empty($_POST["nombre"]) or empty($_POST["ano"])) {
        // Si uno de los datos está vacío, enviará un mensaje de error
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        // El usuario ha enviado datos
        $nombreCursos = $_POST["nombre"];
        $yearCursos = $_POST["ano"];

        // Ejecutar la consulta SQL para insertar datos en la base de datos
        $queryCursos = "INSERT INTO cursos(nombre, año) VALUES ('$nombreCursos', '$yearCursos')";

        if ($conexion->query($queryCursos) === TRUE) {
            // Si todo es correcto, enviará un mensaje de éxito
            echo "$nombreCursos ha sido registrado correctamente";
        } else {
            // En caso de error al ejecutar la consulta SQL, mostrar el mensaje de error
            echo '<div class="error">Error al registrar curso: ' . $conexion->error . '</div>';
        }
    }
}

if (isset($_POST["verCursos"])) {
    header("Location: ../views/cursos.php");
}

if (isset($_POST["mostrarCursos"])) {
    // Verificar que la conexión se haya establecido correctamente
    if ($conexion === null) {
        echo "Error de conexión a la base de datos.";
    } else {
        $show = "SELECT * FROM cursos";
        $result = $conexion->query($show);

        // Guardar los resultados en la sesión
        $_SESSION['cursos_result'] = $result;

        // Redirigir a la página que mostrará los cursos
        header("Location: ../views/mostrarCursos.php");
        exit(); // Asegúrate de salir después de la redirección
    }
}
?>

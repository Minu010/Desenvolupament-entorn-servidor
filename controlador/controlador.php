<?php

    ////////////REGISTRO//////////////

    // Verificar si el formulario ha sido enviado
    if(isset($_POST["registro"])) {
        // Conexión a la base de datos
        require("../modelo/modelo.php");
        $database = new Database();
        $conexion = $database->conectar();

        // Verificar si se han proporcionado todos los campos requeridos
        if (empty($_POST["nick"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["confirmar_password"])) {
            // Si uno de los datos está vacío, enviará un mensaje de error
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            // El usuario ha enviado datos
            $nick = $_POST["nick"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmar_password = $_POST["confirmar_password"];

            if ($password !== $confirmar_password) {
                // Verificar si las contraseñas coinciden
                echo '<div class="alerta">Las contraseñas no coinciden</div>';
            } else {
                // Encriptar la contraseña
                $password_encriptada = password_hash($password, PASSWORD_DEFAULT);

                // Ejecutar la consulta SQL para insertar datos en la base de datos
                $query = "INSERT INTO usuarios(nick, email, password) VALUES ('$nick', '$email', '$password_encriptada')";
                
                if ($conexion->query($query) === TRUE) {
                    // Si todo es correcto, enviará un mensaje de éxito
                    echo '<div class="success">Usuario registrado correctamente</div>';
                    header("Location:../vista/login.php");
                } else {
                    // En caso de error al ejecutar la consulta SQL, mostrar el mensaje de error
                    echo '<div class="error">Error al registrar usuario: ' . $conexion->error . '</div>';
                }
            }
        }
    }

    ////////////LOGIN//////////////

        // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        require("../modelo/modelo.php");
        $database = new Database();
        $conexion = $database->conectar();

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener el hash de la contraseña
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $conexion->query($query);

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $hash_almacenado = $fila["password"];

            // Verificar la contraseña utilizando password_verify
            if (password_verify($password, $hash_almacenado)) {
                echo '¡Inicio de sesión exitoso!';
                //redirigir al Dashboard
                header("Location:../index.php");
            } else {
                echo '<div class="success">Nombre de usuario o contraseña incorrectos.</div>';
            }
        } else {
            echo '<div class="success">Nombre de usuario o contraseña incorrectos.</div>';
        }

        $conexion->close();
    }
?>
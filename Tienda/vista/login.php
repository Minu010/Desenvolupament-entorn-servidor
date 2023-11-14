<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="./recursos/css/estilo.css">
</head>
<body>
    <div class="card-container">
        <!-- FORMULARIO DE REGISTRO -->
        <form action="../controlador/controlador.php" method="POST" class="formulario">

            <?php
            // Llamando conexion.php para conectar a la base de datos
            include("../modelo/modelo.php");
            include("../controlador/controlador.php");

            // Verificar si el formulario se ha enviado y procesado en el servidor
            if (isset($_POST['login'])) {
                // Aquí puedes verificar las credenciales del usuario y realizar acciones necesarias

                // Después de procesar el formulario, mostrar el mensaje con JavaScript
                echo '<script>alert("¡Sesión iniciada!");</script>';
            }
            ?>
            
            <div class="card">
                <h2>INICIAR SESIÓN</h2>
                <div class="">
                    <!-- EMAIL -->
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="llave">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    
                    <!-- Botón para enviar el formulario -->
                    <div class="cuenta">
                        <button class="boton" type="submit" name="login">Login</button>
                        <p>¿No tienes una cuenta? <a href="../vista/registro.php">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

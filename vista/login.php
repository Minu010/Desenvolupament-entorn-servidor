<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="card-container">
        <!-- FORMULARIO DE REGISTRO -->
        <form action="../controlador/controlador.php" method="POST" class="formulario">

            <?php
            // Llamando conexion.php para conectar a la base de datos
            include("../modelo/modelo.php");
            include("../controlador/controlador.php");
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
                        <input class="boton" type="submit" name="login">
                        <p>¿No tienes una cuenta? <a href="../vista/registro.php">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
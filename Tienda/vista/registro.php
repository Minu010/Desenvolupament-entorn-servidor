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
                <h2>REGISTRAR</h2>
                <div class="">
                    <!-- NICK -->
                    <div class="nick">
                        <label for="nick">Nick</label>
                        <input type="text" name="nick" placeholder="Nombre de usuario">
                    </div>

                    <!-- EMAIL -->
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Introduce el correo electrónico">
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="llave">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" placeholder="Registrar contraseña">
                    </div>

                    <!-- CONFIRMAR CONTRASEÑA -->
                    <div class="llave">
                        <label for="confirmar_password">Confirmar contraseña</label>
                        <input type="password" name="confirmar_password" placeholder="Confirmar la contraseña">
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <div class="cuenta">
                        <input class="boton" type="submit" value="Registrar" name="registro">
                        <a href="../vista/login.php">Salir</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

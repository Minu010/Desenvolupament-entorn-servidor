<?php 
//    include("../models/models.php");
 //   include("../controllers/controllers.php");
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
    <h2>REGISTRAR CURSOS</h2>
    <form action="../controllers/controllers.php" method="POST">
        <!-- NOMBRE -->
        <label for="name">Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <!-- AÑO -->
        <label for="year">Año:</label>
        <input type="number" id="year" name="ano" min="1900" max="2100" step="1">


        <!-- ENVIAR -->
        <input type="submit" value="Enviar" name="enviarCursos"><br><br>

        <input type="submit" value="mostrar cursos" name="mostrarCursos">
    </form>
</body>
</html>
<?php 
    include("./models/models.php");
    include("./controllers/controllers.php");
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
    </form> 
</body>
</html>
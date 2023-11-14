<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link href="./recursos/css/inicio.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<script type="text/javascript">function Confirm() {var respuesta = confirm("Estás seguro de salir de la sesión?");if (respuesta == true) {return true;}else {return false;}}</script>

<body>
    <h1>CATÁLOGO DE PRODUCTOS</h1>
    <!--Barra de navegación-->
    <form action="" method="POST">
        <div class="navbar">
            <button onclick="return Confirm()"><a href="vista/login.php" class="boton" name="logout">logout</a></button>
        </div>
        </form>
    <div class="container">
        <div class="row">
            <?php
                require("modelo/modelo.php");
                $database = new Database();
                $conexion = $database->conectar();
                
                // Nombres de productos
                $nombres_productos = ["Chanclas", "Deportivas", "Zapatos"];
                
                // Realizar una consulta a la base de datos
                $query = "SELECT id, nombre, stock, precio_unitario, category FROM productos WHERE activo = 1 LIMIT 3";
                $resultado = $conexion->query($query);
                
                // Verificar si hay resultados
                if ($resultado->num_rows > 0) {
                    // Iterar sobre los resultados y mostrar la información con un bucle for
                    card();
                } else {
                    // No hay resultados
                    echo "No hay productos disponibles.";
                }
                
                // Cerrar la conexión a la base de datos
                $conexion->close();
            ?>
        </div>
    </div>


    <!--<h1>TIENDA ONLINE</h1>
    -!--Barra de navegación--

    <button><a href="../tienda/controlador/logout.php" class="boton">logout</a></button>
    !--Contenido--
    <div class="card-container">
        <div class="card">
            <img src="./vista/img/deportivas.png" alt="">
            <div class="botones">
                <button class="botonz">20€</button>
                <button>Agregar</button>
            </div>
        </div>

        <div class="card">
            <img src="./vista/img/chanclas.png" alt="">
            <div class="botones">
                <button class="botonz">20€</button>
                <button>Agregar</button>
            </div>
        </div>

        <div class="card">
            <img src="./vista/img/zapatos.png" alt="">
            <div class="botones">
                <button class="botonz">20€</button>
                <button>Agregar</button>
            </div>
        </div>
    </div>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
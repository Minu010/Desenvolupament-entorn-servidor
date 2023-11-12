<?php
class Database {
    private $hostname = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'tienda';
    private $port = '3306';

    public function conectar() {
        $conexion_bd = new mysqli($this->hostname, $this->user, $this->password, $this->dbname, $this->port);
        $conexion_bd->set_charset("utf8");

        // Verificar la conexión
        if ($conexion_bd->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion_bd->connect_error);
        }

        return $conexion_bd;
    }
}

function card() {
    $nombres_productos = ["Chancla", "Deportivas", "Zapatos"];

    $precios = array(
        1 => 50.00,  // Precio para el producto 1
        2 => 60.00,
        3 => 49.00
    );

    // Realizar una consulta a la base de datos
    $database = new Database();
    $conexion = $database->conectar();
    $query = "SELECT id, nombre, stock, category FROM productos WHERE activo = 1 LIMIT 3";
    $resultado = $conexion->query($query);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
        // Iterar sobre los resultados y mostrar la información con un bucle for
        for ($i = 1; $fila = $resultado->fetch_assoc(); $i++) {
            // Obtener el nombre del producto del array
            $nombre_producto = isset($nombres_productos[$i - 1]) ? $nombres_productos[$i - 1] : "Producto";

            // Obtener el precio del producto del array de precios
            $precio_producto = isset($precios[$i]) ? $precios[$i] : 0.00;

            echo "
            <div class='card' style='width: 18rem;'>
                <img class='card-img-top' src='./vista/img/{$fila['id']}.png' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>Producto $i: $nombre_producto</h5>
                    <p class='card-text'>Stock: {$fila['stock']} </br> Precio: $precio_producto € </br> Categoría: {$fila['category']}</p>
                    <a href='#' class='btn btn-primary'>Añadir al carrito</a>
                </div>
            </div>";
        }
    } else {
        // No hay resultados
        echo "No hay productos disponibles.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

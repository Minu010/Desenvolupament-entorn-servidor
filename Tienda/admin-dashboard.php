<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<br> <br><h2>PRODUCTOS</h2> <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">

                        <!--PRODUCTOS-->
                        <h3>PRODUCTO</h3>

                        <form action="" method="post">
                            <div class="form-grupo">
                                <label for="">Codigo</label>
                                <input type="text" name="codigo" id="codigo" class="form-control">
                            </div>

                            <div class="form-grupo">
                                <label for="">Producto</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>

                            <div class="form-grupo">precio
                                <label for="">Precio</label>
                                <input type="text" name="precio_unitario" id="precio_unitario" class="form-control">
                            </div>

                            <div class="form-grupo">
                                <label for="">Cantidad</label>
                                <input type="text" name="stock" id="stock" class="form-control">
                            </div>

                            <div class="form-grupo">
                                <input type="button" value="registrar" id="registrar" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <table class="table table-hover table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
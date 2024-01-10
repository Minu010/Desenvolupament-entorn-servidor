<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dbdb845362.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <h1 class="text-center p-3">CRUD en Laravel</h1>
    <br>
    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
    <br>
    @if(session("correcto"))
      <div class="alert alert-success">{{session("correcto")}}</div>
    @endif
    @if(session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif
    <script>
      var res=function(){
          var not=confirm("¿Estás seguro de eliminar?");
          return not;
      }
    </script>
    <!-- Modal registro de datos-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir datos</h1>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.create")}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de Pokémon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipo de Pokémon</label>
                            <select name="Tipo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <option value=""></option>
                                <option value="Acero">Acero</option>
                                <option value="Agua">Agua</option>
                                <option value="Dragón">Dragón</option>
                                <option value="Eléctrico">Eléctrico</option>
                                <option value="Fantasma">Fantasma</option>
                                <option value="Hada">Hada</option>
                                <option value="Normal">Normal</option>
                                <option value="Planta">Planta</option>
                                <option value="Psíquico">Psíquico</option>
                                <option value="Siniestro">Siniestro</option>
                                <option value="Tierra">Tierra</option>
                                <option value="Volador">Volador</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tamaño de Pokémon</label>
                            <select name="Tamaño" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <option value=""></option>
                                <option value="Grande">Grande</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Pequeño">Pequeño</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Peso de Pokémon</label>
                            <input type="number" step="0.01" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Peso">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 table-responsive">
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalInsertar">Añadir Pokémon</button>
        <!-- TABLAS PARA EL CRUD -->
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Peso</th>
                    <th></th>
                </tr>
            </thead>
            <!-- IMPRIMIENDO LOS DATOS DE LA BBDD A LAS COLUMNAS -->
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                <tr>
                    <th>{{$item->Id}}</th>
                    <td>{{$item->Nombre}}</td>
                    <td>{{$item->Tipo}}</td>
                    <td>{{$item->Tamaño}}</td>
                    <td>{{$item->Peso}} kg</td>

                    <!-- Editar y borrar pokémon -->
                    <td>
                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->Id}}"><i class="fa-regular fa-pen-to-square"></i> Editar</a>
                        <a href="{{route("crud.delete",$item->Id)}}" class="btn btn-danger btn-sm" onclick="return res()"><i class="fa-regular fa-trash-can"></i> Borrar</a>
                    </td>
                </tr>

                <!-- Modal editar datos -->
                <div class="modal fade" id="modalEditar{{$item->Id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route("crud.update")}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Id de Pokémon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Id" value="{{$item->Id}}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de Pokémon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nombre" value="{{$item->Nombre}}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tipo de Pokémon</label>
                                        <select name="Tipo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            <option value=""></option>
                                            <option value="Acero" {{$item->Tipo == 'Acero' ? 'selected' : ''}}>Acero</option>
                                            <option value="Agua" {{$item->Tipo == 'Agua' ? 'selected' : ''}}>Agua</option>
                                            <option value="Dragón" {{$item->Tipo == 'Dragón' ? 'selected' : ''}}>Dragón</option>
                                            <option value="Eléctrico" {{$item->Tipo == 'Eléctrico' ? 'selected' : ''}}>Eléctrico</option>
                                            <option value="Fantasma" {{$item->Tipo == 'Fantasma' ? 'selected' : ''}}>Fantasma</option>
                                            <option value="Hada" {{$item->Tipo == 'Hada' ? 'selected' : ''}}>Hada</option>
                                            <option value="Normal" {{$item->Tipo == 'Normal' ? 'selected' : ''}}>Normal</option>
                                            <option value="Planta" {{$item->Tipo == 'Planta' ? 'selected' : ''}}>Planta</option>
                                            <option value="Psíquico" {{$item->Tipo == 'Psíquico' ? 'selected' : ''}}>Psíquico</option>
                                            <option value="Siniestro" {{$item->Tipo == 'Siniestro' ? 'selected' : ''}}>Siniestro</option>
                                            <option value="Tierra" {{$item->Tipo == 'Tierra' ? 'selected' : ''}}>Tierra</option>
                                            <option value="Volador" {{$item->Tipo == 'Volador' ? 'selected' : ''}}>Volador</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tamaño de Pokémon</label>
                                        <select name="Tamaño" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <option value=""></option>
                                            <option value="Grande" {{$item->Tamaño == 'Grande' ? 'selected' : ''}}>Grande</option>
                                            <option value="Mediano" {{$item->Tamaño == 'Mediano' ? 'selected' : ''}}>Mediano</option>
                                            <option value="Pequeño" {{$item->Tamaño == 'Pequeño' ? 'selected' : ''}}>Pequeño</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Peso de Pokémon</label>
                                        <input type="number" class="form-control" step="0.01" id="exampleInputEmail1" aria-describedby="emailHelp" name="Peso" value="{{$item->Peso}}">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

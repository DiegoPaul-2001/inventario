<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <br>
    <center>
        <h1><b style="color: white; background-color:black">FORMULARIO BODEGAS</b>
    </center>
    <title>ISTVN</title>
</head>
<br>
<br>
<br>

<body style=" background-size: cover;">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">Brand</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item disabled">
                    <a class="nav-link" href="../../index.php">INICIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../php/listas/buscarUsuarios.php" tabindex="-1" aria-disabled="true">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../php/listas/buscarCategorias.php" tabindex="-1" aria-disabled="true">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../php/listas/buscarProductos.php" tabindex="-1" aria-disabled="true">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../php/listas/buscarProvedores.php" tabindex="-1" aria-disabled="true">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="formBodegas.php" tabindex="-1" aria-disabled="true">Bodegas</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link disabled" href="formRegistro.php" tabindex="-1" aria-disabled="true">Registro Productos</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <?php
    include("../php/funciones/funcionBodegas.php");
    if (isset($_POST['editar'])) {
        $edit = $_POST['id'];
        $editar = buscarPorId($edit);
        $ver = mysqli_fetch_array($editar);
        echo '
 <form method="POST" >
     <center>
        <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                <br>
                         <h3>Modificar Bodega </h3>
                          <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                    <div class="card-body">
                      ';
        do {
            $id = $ver['BODID'];
            $nombre = $ver['BODNOMBRE'];
            $telefono = $ver['BODTELEFONO'];
            $direccion = $ver['BODDIRECCION'];
            $borrado = $ver['BODBORRADO'];
            echo '
            <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                             <input type="text" value="' . $id . '" name="id" class="form-control" readonly placeholder="Id"><br>
                             </div>
                              <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                             <input type="text" value="' . $nombre . '" name="nombre" class="form-control"  required><br>
                             </div>
                              <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                             <input type="text" value="' . $telefono . '" name="telefono" class="form-control"  required><br>
                             </div>
                              <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                             <input type="text" value="' . $direccion . '" name="direccion" class="form-control" required><br>
                             </div>
                              <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                                   <Select class="form-control" name="estado">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </Select>
                            </div>
                             ';
        } while ($ver = mysqli_fetch_array($editar));
        echo '
                         </div>
                         <div>
                             <button class="btn  login_btn" type="submit" name="modificar">Modificar</button>
                         </div>
                     </div>
                     <div>
     </center>
 </form>
 ';
    }
    if (isset($_POST['modificar'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $estado = $_POST['estado'];
        $editar = modificarBodegas($id, $nombre, $telefono, $direccion, $estado);
        echo "
                                 <script>
                                alert('Modificado Exitosamente.. ');
                                location.href='./formBodegas.php';
                                 </script>
                                ";
    }
    ?>
</body>

</html>
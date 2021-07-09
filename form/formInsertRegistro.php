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
    <link rel="stylesheet" type="text/css" href="../css/estilo1.css">
    <br>
    <center>
        <h1><b style="color: white; background-color:black">FORMULARIO REGISTRO DE PRODUCTOS</b>
    </center>
    <title>ISTVN</title>
</head>
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
                    <a class="nav-link disabled" href="formBodegas.php" tabindex="-1" aria-disabled="true">Bodegas</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link active" href="formRegistro.php" tabindex="-1" aria-disabled="true">Registro Productos</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <br>
                    <center>
                        <h3>Registro Bodegas </h3>
                    </center>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post">
                        <?php
                        include("../php/funciones/funcionRegistro.php");
                        $revisar = buscarBodegas();
                        $ver = mysqli_fetch_array($revisar);
                        echo '
                             <center><h5 style="color:white">Bodegas</h5></center>   
                  <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>             
                    <select name="bodegas" class="form-control">
                ';
                        do {
                            $id = $ver['BODID'];
                            $nombre = $ver['BODNOMBRE'];
                            echo '
                    <option value="' . $id . '">' . $nombre . '</option>
                    ';
                        } while ($ver = mysqli_fetch_array($revisar));
                        echo '</select>
                            </div>';
                        ?>
                        <?php
                        $revisar = buscarProductos();
                        $ver = mysqli_fetch_array($revisar);
                        echo '
                             <center><h5 style="color:white">Productos</h5></center>   
                  <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>             
                    <select name="productos" class="form-control">
                ';
                        do {
                            $id = $ver['PROID'];
                            $nombre = $ver['PRONOMBRE'];
                            echo '
                    <option value="' . $id . '">' . $nombre . '</option>
                    ';
                        } while ($ver = mysqli_fetch_array($revisar));
                        echo '</select>
                            </div>';
                        ?>
                        <?php
                        $revisar = buscarUsuarios();
                        $ver = mysqli_fetch_array($revisar);
                        echo '
                             <center><h5 style="color:white">Usuarios</h5></center>   
                  <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>             
                    <select name="usuarios" class="form-control">
                ';
                        do {
                            $id = $ver['USUID'];
                            $nombre = $ver['USUNOMBRE'];
                            echo '
                    <option value="' . $id . '">' . $nombre . '</option>
                    ';
                        } while ($ver = mysqli_fetch_array($revisar));
                        echo '</select>
                            </div>';
                        ?>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">

                        </div>
                        <center>
                            <h5 style="color:white">Fecha</h5>
                        </center>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="date" class="form-control" placeholder="Fecha" name="fecha" id="fecha">
                        </div>
                        <div class="form-group">
                            <center> <input type="submit" value="Guardar" class="btn  login_btn" name="buscar" id="buscar">
                            </center>
                            <?php
                            if (isset($_POST['buscar'])) {
                                $idbod = $_POST['bodegas'];
                                $idpro = $_POST['productos'];
                                $idusu = $_POST['usuarios'];
                                $cantidad = $_POST['cantidad'];
                                $fecha = $_POST['fecha'];
                                if ($nombre === '' || $idpro === '' || $idusu === '' || $cantidad === '' || $fecha === '') {
                                    echo "
                                 <script>
                                 alert('Datos Vacios Verifique Por favor.. ');
                                 </script>
                                ";
                                } else {
                                    $insertar = insertarRegistro($idbod, $idpro, $idusu, $cantidad, $fecha);
                                    echo "
                                 <script>
                                 alert('Registrado Exitosamente.. ');
                                 </script>
                                ";
                                    if ($insertar) {
                                        echo "
                                 <script>
                                location.href='./formRegistro.php';
                                 </script>
                                ";
                                    }
                                }
                            }
                            ?>
                        </div>
                </div>
            </div>
        </div>

        <br>
        <center>

        </center>
    </div>
</body>

</html>
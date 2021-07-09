<?php
include("../php/funciones/funcionBodegas.php");
?>
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
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <br>
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
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion">
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
                        <div class="form-group">
                            <center> <input type="submit" value="Guardar" class="btn  login_btn" name="buscar" id="buscar">
                            </center>
                            <?php
                            if (isset($_POST['buscar'])) {
                                $nombre = $_POST['nombre'];
                                $telefono = $_POST['telefono'];
                                $direccion = $_POST['direccion'];
                                $estado = $_POST['estado'];
                                if ($nombre === '' || $telefono === '' || $direccion === '' || $estado === '') {
                                    echo "
                                 <script>
                                 alert('Datos Vacios Verifique Por favor.. ');
                                 </script>
                                ";
                                } else {
                                    $insertar = insertBodegas($nombre, $telefono, $direccion, $estado);
                                    echo "
                                 <script>
                                 alert('Registrado Exitosamente.. ');
                                 </script>
                                ";
                                    if ($insertar) {
                                        echo "
                                 <script>
                                location.href='./formBodegas.php';
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
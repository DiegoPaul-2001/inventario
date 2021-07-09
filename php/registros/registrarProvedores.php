<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--FUENTE LETRA:-->
    <link rel="stylesheet" href="https://use.typekit.net/mdi6pgl.css">
    <!--BOOTSTRAP/CSS:-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">

    <!--BOOTSTRAP:-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <link rel="stylesheet" href="../../css/estilos.css">
    
        <title>Registrar Provedores</title>
</head>
<script>
    function guardar() {
            let nombre = document.getElementById('nombre').value;
            let descripcion = document.getElementById('descripcion').value;
            let telefono = document.getElementById('telefono').value;
            let correo = document.getElementById('correo').value;
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
               alert(this.responseText);               
            }
            xhttp.open("GET", "../../webService/cliente/cliente.php?accion=guardar&nombre=" + nombre+"&descripcion="+descripcion+"&telefono="+telefono+"&correo="+correo);
            xhttp.send();
        }

</script>   
<body>
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
                    <a class="nav-link disabled" href="../listas/buscarUsuarios.php" tabindex="-1" aria-disabled="true">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../listas/buscarCategorias.php" tabindex="-1" aria-disabled="true">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../listas/buscarProductos.php" tabindex="-1" aria-disabled="true">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../listas/buscarProvedores.php" tabindex="-1" aria-disabled="true">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../../form/formBodegas.php" tabindex="-1" aria-disabled="true">Bodegas</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link disabled" href="../../form/formRegistro.php" tabindex="-1" aria-disabled="true">Registro Productos</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
<div class="container" >
    <div class="row" >
        <div class="col-md-6" >
            <div class="card" >
                <form method="POST"  class="box" >
                    <h1>REGISTRAR PROVEDORES</h1>
                    <input type="text" name="nombre" placeholder="Nombre" id="nombre" minlength="0" maxlength="10"> 
                    <textarea type="text" name="descripcion" id="descripcion" placeholder="Descripcion"></textarea>
                    <input type="text" name="telefono" id="telefono" placeholder="Telefono"> 
                    <input type="text" name="correo" id="correo" placeholder="Correo"> 
                    <input type="submit" name="agregar" value="Agregar">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php
    include ("../funciones/funcionProvedores.php");
    if (isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $clave = $_POST['clave'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $insertar = insertar($nombre,$descripcion,$telefono,$correo);
        if ($insertar) {
            echo "
            <script>
            alert('usuario ingresado correctamente');
        </script>
            ";
            header("Location: ../listas/buscarProvedores.php");
        }else{
            echo "
            <script>alert('Usuario no ingresado');</script>
            ";
        }
    }
?>
</html>

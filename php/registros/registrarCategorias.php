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
    
        <title>Registrar Categorias</title>
</head>
<body>
<div class="container" >
    <div class="row" >
        <div class="col-md-6" >
            <div class="card" >
                <form method="POST"  class="box" >
                    <h1>REGISTRAR CATEGORIAS</h1>
                    <input type="text" name="nombre" placeholder="Nombre de la Categoria" minlength="0" maxlength="10"> 
                    <textarea type="text" name="descripcion" placeholder="Ingrese una Descripcion de la Categoria"></textarea>
                    <select  class="sele" name="tipo">                            
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                    </select>
                    <input type="submit" name="agregar" value="Agregar">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php
    include ("../funciones/funcionCategorias.php");
    if (isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $insertar = insertar($nombre,$descripcion,$tipo);
        if ($insertar) {
            echo "
            <script>
            alert('usuario ingresado correctamente');
        </script>
            ";
            header("Location: ../listas/buscarCategorias.php");
        }else{
            echo "
            <script>alert('Usuario no ingresado');</script>
            ";
        }
    }
?>
</html>

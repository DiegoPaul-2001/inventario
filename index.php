<?php    
    session_start();
    $usuario = $_SESSION['usuario'];

    include ("php/funciones/funcionUsuarios.php");
    $conexion = conexion();
    $query = "select USUNOMBRE as nombre from usuarios WHERE USUUSUARIO = '$usuario'";
    $query2 = "select USUID as id from usuarios WHERE USUUSUARIO = '$usuario'";
    $query3 = "select USUTIPO as tipo from usuarios WHERE USUUSUARIO = '$usuario'";
    $consulta = mysqli_query($conexion,$query);
    $consulta2 = mysqli_query($conexion,$query2);    
    $consulta3 = mysqli_query($conexion,$query3);    
    $array = mysqli_fetch_array($consulta);
    $array2 = mysqli_fetch_array($consulta2);
    $array3 = mysqli_fetch_array($consulta3);
    $tipo = $array3['tipo'];
    $_SESSION['nombre'] = $array['nombre'];
    $_SESSION['id'] = $array2['id'];
    $_SESSION['tipo'] = $array3['tipo'];
?>
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
    <!--BOOTSTRAP:-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>PAGINA PRINCIPAL</title>
</head>
<body class="fondo">
    <?php
        if ($tipo == 'admin') {            
           echo '
           <label for=""> Bienvenido: </label> '.$usuario.'
           <label for=""> Tipo: </label> '.$tipo.'
           ';
    ?>
        <center><h1 >SISTEMA ACADEMICO</h1></center>
       <center><div class="container row espacio">
        <a class="col-6 espacio t1" href="php/listas/buscarCategorias.php"><button class="btn col-12 boton" type="button"> LISTADO DE CATEGORIAS</button></a><br>
            <a class="col-6 espacio t1" href="php/listas/buscarProductos.php"><button class="btn col-12 boton" type="button"> LISTADO DE PRODUCTOS</button></a>   <br> 
            <a class="col-6 espacio t1" href="php/listas/buscarProvedores.php"><button class="btn col-12 boton" type="button"> LISTADO DE PROVEEDORES</button></a><br>
            <a class="col-6 espacio t1" href="php/listas/buscarUsuarios.php"><button class="btn col-12 boton" type="button"> LISTADO DE USUARIOS</button></a><br>
        </div></center>
    <?php    
        }else{    
            echo '
           <label for=""> Bienvenido: </label> '.$usuario.'
           <label for=""> Tipo: </label> '.$tipo.'
           ';
    ?>  
         <h1 > SISTEMA ACADEMICO</h1>   
        <div class="container row espacio">
            <a class="col-5 espacio t1" href="php/listas/buscarCategorias.php"><button class="btn col-12 boton" type="button"> LISTADO DE CATEGORIAS</button></a><br>
            <a class="col-5 espacio t1" href="php/listas/buscarProductos.php"><button class="btn col-12 boton" type="button"> LISTADO DE PRODUCTOS</button></a>   <br> 
            <a class="col-5 espacio t1" href="php/listas/buscarProvedores.php"><button class="btn col-12 boton" type="button"> LISTADO DE PROVEEDORES</button></a><br>
            <a class="col-5 espacio t1" href="php/listas/buscarUsuarios.php"><button class="btn col-12 boton" type="button"> LISTADO DE USUARIOS</button></a><br>            
        </div>
    <?php        
        }
    ?>
</body>
</html>
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
    <title>PAGINA PRINCIPAL</title>
</head>
<body>
    <?php
        if (isset($_SESSION['tipo']) == 'Administrador') {
    ?>         

    <?php
        }else{
    ?>
        
    <?php
        }
    ?>
</body>
</html>
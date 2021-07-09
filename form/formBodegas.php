<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
<center> <a href="formInsertBodegas.php."><button class="btn btn-primary" type="submit" value="' . $id . '" name="editar">Agregar Bodega</button></a></td>
    <br>

    <body style=" background-size: cover;">
</center>
<br>
<br>
<center>
    <div>
        <center>
            <?php
            include("../php/funciones/funcionBodegas.php");
            $revisar = BuscarTodosBodegas();
            $ver = mysqli_fetch_array($revisar);
            echo '<b style>><table  class ="table table-dark table-striped col-10" ,class="">
        <tr class=" table-dark ">
        <td>ID</td>
        <td>NOMBRE</td>
        <td>TELEFONO</td>
        <td>DIRECCION</td>
        <td colspan="4" align="center">ACCIONES</td>
        
        </tr>';

            do {
                $id = $ver['bodid'];
                $nombre = $ver['bodnombre'];
                $telefono = $ver['bodtelefono'];
                $direccion = $ver['boddireccion'];
                echo '<tr>
            <td>' . $id . '</td>
            <td>' . $nombre . '</td>
            <td>' . $telefono . '</td>
            <td>' . $direccion . '</td>
             <form method="post" action="formModificar.php">
                <input style="display:none" type="text" value="' . $id . '" name="id" class="form-control" readonly required placeholder="Id"><br>
           <td align="center"><button class="btn btn-warning" type="submit" value="' . $id . '" name="editar">Editar</button></td>
            </form>
            <form method="post">
            <td align="center"><button class="btn btn-danger" type="submit"  value="' . $id . '" name="eliminar">Eliminar</button></td>
            </form>
           
            ';
            } while ($ver = mysqli_fetch_array($revisar));
            echo '</table></center>';

            if (isset($_POST['eliminar'])) {
                $delete = $_POST['eliminar'];
                $borrar = eliminarBodegas($delete);
            }
            if (isset($_POST['editar'])) {
                $edit = $_POST['editar'];
                header("Location:formModificar.php");
            }
            ?>

            </body>
        </center>

</html>
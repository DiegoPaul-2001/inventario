
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

    <title>Lista de Categorias</title>
</head>    
<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container col-8">
    <a href="../registros/registrarUsuario.php"><button class="btn btn-primary" type="button">AGREGAR</button></a>
    <a href="javascript:location.reload()"><button class="btn btn-success" type="button">REFRESCAR</button></a>
    <label for="Buscar"> Buscar: </label><input type="text" id="buscar" name="buscar" placeholder="diego">
    <br><br>
    <?php
        include ("../funciones/funcionCategorias.php");
        $conexion = conexion();        
        $revisar = consultarTodos();
        $ver = mysqli_fetch_array($revisar);
        echo '<center><form method="post"><table  class="table">
        <tr class=" table-dark">
        <td>ID</td>
        <td>NOMBRE</td>
        <td>DESCRIPCION</td>
        <td>ESTADO</td>
        <td colspan="2" align="center">ACCIONES</td>    
        </tr>';
        do {
            $id = $ver['CATID'];
            $nombre = $ver['CATNOMBRE'];
            $descripcion = $ver['CATDESCRIPCION'];
            $estado = $ver['CATESTADO'];
            echo '<tr>
            <td>'.$id.'</td>
            <td>'.$nombre.'</td>
            <td>'.$descripcion.'</td>
            <td>'.$estado.'</td>
            <td align="center"><button class="btn btn-warning" type="submit" value="'.$id.'" name="editar">Editar</button></td>
            <td align="center"><button class="btn btn-danger" type="submit"  value="'.$id.'" name="eliminar">Eliminar</button></td>
            </tr>
            ';
        }while ( $ver = mysqli_fetch_array($revisar));
            echo '</table></form></center>';                  
            if (isset($_POST['eliminar'])) {     
                $delete = $_POST['eliminar'];                   
                $borrar = eliminar($delete);
                echo "<script>window.location.href='buscarCategorias.php';</script>";                
            }
            if (isset($_POST['editar'])) {  
                $edit = $_POST['editar']; 
                $editar = buscarPorId($edit);
                $ver = mysqli_fetch_array($editar);
                echo '
                <div class="container" >
                <div class="row" >
                    <div class="col-md-6" >
                        <div class="card" >
                            <form method="POST"  class="box" >
                                <h1>EDITAR CATEGORIAS</h1>
                ';
                do {
                    $id = $ver['CATID'];
                    $nombre = $ver['CATNOMBRE'];
                    $descripcion = $ver['CATDESCRIPCION'];
                    echo '
                        <input type="text" name="id"  value="'.$id.'" placeholder="Nombre"> 
                        <input type="text" name="nombre" value="'.$nombre.'" placeholder="Nombre"> 
                        <input type="text" name="descripcion" value="'.$descripcion.'" placeholder="Usuario"> 
                        <select  class="sele" name="tipo">                            
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                    ';
            }while ( $ver = mysqli_fetch_array($editar));
                echo '
                        </select>
                        <input type="submit" name="modificar" value="Modificar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                ';  
            }
            if(isset($_POST['modificar'])){
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $estado = $_POST['tipo'];
                $editar = actualizar($id,$nombre,$descripcion,$estado,'1');
                echo "<script>window.location.href='buscarCategorias.php';</script>";                

        }            
    ?>
    </div>
</body>
</html>
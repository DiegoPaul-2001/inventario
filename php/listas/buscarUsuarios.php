
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

    <title>Document</title>
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
        include ("../funciones/funcionUsuarios.php");
        $conexion = conexion();        
        $revisar = consultarTodos();
        $ver = mysqli_fetch_array($revisar);
        echo '<center><form method="post"><table  class="table">
        <tr class=" table-dark">
        <td>ID</td>
        <td>CEDULA</td>
        <td>NOMBRE</td>
        <td>USUARIO</td>
        <td>CLAVE</td>
        <td>CORREO</td>
        <td>TELEFONO</td>
        <td>TIPO</td>
        <td colspan="2" align="center">ACCIONES</td>    
        </tr>';
        do {
            $id = $ver['USUID'];
            $cedula = $ver['USUCEDULA'];
            $nombre = $ver['USUNOMBRE'];
            $usuario = $ver['USUUSUARIO'];
            $clave = $ver['USUCLAVE'];
            $correo = $ver['USUCORREO'];
            $telefono = $ver['USUTELEFONO'];
            $tipo = $ver['USUTIPO'];
            echo '<tr>
            <td>'.$id.'</td>
            <td>'.$cedula.'</td>
            <td>'.$nombre.'</td>
            <td>'.$usuario.'</td>
            <td>'.$clave.'</td>
            <td>'.$correo.'</td>
            <td>'.$telefono.'</td>
            <td>'.$tipo.'</td>
            <td align="center"><button class="btn btn-warning" type="submit" value="'.$id.'" name="editar">Editar</button></td>
            <td align="center"><button class="btn btn-danger" type="submit"  value="'.$id.'" name="eliminar">Eliminar</button></td>
            </tr>
            ';
        }while ( $ver = mysqli_fetch_array($revisar));
            echo '</table></form></center>';                  
            if (isset($_POST['eliminar'])) {     
                $delete = $_POST['eliminar'];                   
                $borrar = eliminar($delete); 
                echo "<script>window.location.href='buscarUsuarios.php';</script>";                
               
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
                                <h1>REGISTRAR USUARIO</h1>
                ';
                do {
                    $id = $ver['USUID'];
                    $cedula = $ver['USUCEDULA'];
                    $nombre = $ver['USUNOMBRE'];
                    $usuario = $ver['USUUSUARIO'];
                    $clave = $ver['USUCLAVE'];
                    $correo = $ver['USUCORREO'];
                    $telefono = $ver['USUTELEFONO'];                
                    echo '
                        <input type="text" name="id"  value="'.$id.'" placeholder="Nombre"> 
                        <input type="text" name="cedula"  value="'.$cedula.'" placeholder="Cedula" minlength="0" maxlength="10"> 
                        <input type="text" name="nombre" value="'.$nombre.'" placeholder="Nombre"> 
                        <input type="text" name="usuario" value="'.$usuario.'" placeholder="Usuario"> 
                        <input type="password" name="clave" value="'.$clave.'" placeholder="Clave"> 
                        <input type="text" name="correo" value="'.$correo.'" placeholder="Correo"> 
                        <input type="text" name="telefono" value="'.$telefono.'" placeholder="Telefono" minlength="0" maxlength="10">                                  
                        <select  class="sele" name="tipo">                            
                                <option value="vendedor">Vendedor</option>
                                <option value="administrador">Administrador</option>
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
                $cedula = $_POST['cedula'];
                $nombre = $_POST['nombre'];
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                $tipo = $_POST['tipo'];
                $editar = actualizar($id,$cedula,$nombre,$usuario,$clave,$correo,$telefono,$tipo,'1');
                echo "<script>window.location.href='buscarUsuarios.php';</script>";                

        }            
    ?>
    </div>
</body>
</html>
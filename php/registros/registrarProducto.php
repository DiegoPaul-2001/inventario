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
    
        <title>Registrar Productos</title>
</head>
<body>
<div class="container" >
    <div class="row" >
        <div class="col-md-6" >
            <div class="card" >
                <form method="POST"  class="box" >
                    <h1>REGISTRAR PRODUCTOS</h1>
                    <label>CATEGORIAS</label>
                    <select class="sele" name="categorias">
                    <?php
                    include ("../funciones/funcionesProductos.php");
                    $categorias = consultarCompleja("select catnombre as categoria,catid as id FROM categorias where catestado = 'ACTIVO' and catBorrado = 1");
                    foreach($categorias as $row){
                        $result['id'] = $row['id'];
                        $result['categoria'] = $row['categoria'];
                    ?>
                     <option value="<?php $result['id'] ?>"><?php echo $result['categoria'] ?></option>
                 <?php } ?>
                </select>
                <label>PROVEDORES</label>
                <select class="sele" name="provedores">
                    <?php
                    $provedores = consultarCompleja("select prvnombre as provedor,prvid as idP FROM provedor where prvBorrado = 1");
                    foreach($provedores as $rowP){
                        $result['idP'] = $rowP['idP'];
                        $result['provedor'] = $rowP['provedor'];
                    ?>
                     <option value="<?php $result['id'] ?>"><?php echo $result['provedor'] ?></option>
                 <?php } ?>
                </select>
                    <input type="text" name="codigo" placeholder="Codigo" minlength="0" maxlength="10"> 
                    <input type="text" name="nombre" placeholder="Nombre"> 
                    <input type="number" name="valor" placeholder="Valor"> 
                    <input type="text" name="tipVal" placeholder="Tipo de Valor"> 
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
    if (isset($_POST['agregar'])) {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $tipo = $_POST['tipo'];
        $insertar = insertar($cedula,$nombre,$usuario,$clave,$correo,$telefono,$tipo,'1');
        if ($insertar) {
            echo "
            <script>
            alert('usuario ingresado correctamente');
        </script>
            ";
            header("Location: ../listas/buscarUsuarios.php");
        }else{
            echo "
            <script>alert('Usuario no ingresado');</script>
            ";
        }
    }
?>
</html>

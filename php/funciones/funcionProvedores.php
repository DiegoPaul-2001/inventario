<?php  
    function conexion (){
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $basedatos = "inventario";
        $conectar = mysqli_connect($servidor, $usuario, $clave,$basedatos) or die("conexion fallida");
        return $conectar;
    }
    function insertar(string $nombre, string $descripcion, string $telefono,string $correo){
            $conexion = conexion();          
            $insertar = "insert into provedor values(NULL,'$nombre','$descripcion','$telefono','$correo','1')";
            $unir = mysqli_query($conexion, $insertar);
            return $unir;   
    }        
    function consultarTodos(){
        $conexion = conexion();
        $buscar = "select PRVID,PRVNOMBRE,PRVDESCRIPCION,PRVTELEFONO,PRVCORREO,PRVBORRADO FROM provedor WHERE PRVBORRADO = 1";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;        
    }
    function buscarPorId(int $id)
    {                
        $conexion = conexion();       
        $buscarporid = "select PRVID,PRVNOMBRE,PRVDESCRIPCION,PRVTELEFONO,PRVCORREO,PRVBORRADO FROM provedor WHERE PRVID = $id;";
        $unir = mysqli_query($conexion, $buscarporid);
        return $unir;
    }
    function actualizar(int $id ,string $nombre, string $descripcion, string $telefono,string $correo)
    {
        $conexion = conexion();       
        $actualizar = "update provedor SET PRVNOMBRE= '$nombre',PRVDESCRIPCION = '$descripcion', PRVTELEFONO = '$telefono', PRVCORREO ='$correo' WHERE PRVID =  $id";
        $unir = mysqli_query($conexion, $actualizar);
        return $unir;
    }
    function eliminar(int $a)
    {
        $conexion = conexion();  
        $eliminar = "update provedor set PRVBORRADO = 0 where PRVID = $a;";
        $unir = mysqli_query($conexion, $eliminar);
	    return $unir;   
    }
    function buscar(string $nombre)
    {                
        $conexion = conexion();
        $buscar = "Select * from provedor where PRVNOMBRE like '$nombre%';";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;   
    }
?>
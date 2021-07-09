<?php  
    function conexion (){
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $basedatos = "inventario";
        $conectar = mysqli_connect($servidor, $usuario, $clave,$basedatos) or die("conexion fallida");
        return $conectar;
    }
    function insertar(string $nombre,string $descripcion,string $estado){
            $conexion = conexion();          
            $insertar = "insert into categorias values(NULL,'$nombre','$descripcion','$estado','1')";
            $unir = mysqli_query($conexion, $insertar);
            return $unir;   
    }        
    function consultarTodos(){
        $conexion = conexion();
        $buscar = "select CATID,CATNOMBRE,CATDESCRIPCION,CATESTADO,CATBORRADO FROM categorias WHERE CATBORRADO = 1";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;        
    }
    function buscarPorId(int $id)
    {                
        $conexion = conexion();       
        $buscarporid = "select CATID,CATNOMBRE,CATDESCRIPCION,CATESTADO,CATBORRADO FROM categorias WHERE CATID = $id;";
        $unir = mysqli_query($conexion, $buscarporid);
        return $unir;
    }
    function actualizar(int $id ,string $nombre,string $descripcion,string $estado)
    {
        $conexion = conexion();       
        $actualizar = "update categorias SET CATNOMBRE= '$nombre',CATDESCRIPCION = '$descripcion', CATESTADO = '$estado' WHERE CATID = $id";
        $unir = mysqli_query($conexion, $actualizar);
        return $unir;
    }
    function eliminar(int $a)
    {
        $conexion = conexion();  
        $eliminar = "update categorias set CATBORRADO = 0 where CATID = $a;";
        $unir = mysqli_query($conexion, $eliminar);
	    return $unir;   
    }
    function buscar(string $nombre)
    {                
        $conexion = conexion();
        $buscar = "Select * from categorias where CATNOMBRE like '$nombre%';";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;   
    }
?>
<?php
    function conexion (){
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $basedatos = "inventario";
        $conectar = mysqli_connect($servidor, $usuario, $clave,$basedatos) or die("conexion fallida");
        return $conectar;
    }
    function insertar(string $cedula, string $nombre, string $usuario,string $clave, string $correo, string $telefono, string $tipo, string $borrador){
            $conexion = conexion();          
            $insertar = "insert into usuarios values(NULL,'$cedula','$nombre','$usuario','$clave','$correo','$telefono','$tipo','$borrador')";
            $unir = mysqli_query($conexion, $insertar);
            return $unir;   
    }        
    function consultarTodos(){
        $conexion = conexion();
        $buscar = "SELECT USUID, USUCEDULA, USUNOMBRE, USUUSUARIO, USUCLAVE, USUCORREO, USUTELEFONO, USUTIPO  FROM usuarios where USUBORRADO='1'";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;        
    }
    function buscarPorId(int $id)
    {                
        $conexion = conexion();       
        $buscarporid = "Select USUID, USUCEDULA, USUNOMBRE, USUUSUARIO, USUCLAVE, USUCORREO, USUTELEFONO from usuarios where USUID = $id;";
        $unir = mysqli_query($conexion, $buscarporid);
        return $unir;
    }
    function actualizar(int $id ,string $cedula, string $nombre, string $usuario,string $clave, string $correo, string $telefono, string $tipo, string $borrador)
    {
        $conexion = conexion();       
        $actualizar = "update asignatura set USUCEDULA=$cedula, USUNOMBRE=$nombre, USUUSUARIO='$usuario', USUCLAVE='$clave', USUCORREO='$correo', USUTELEFONO='$telefono', USUTIPO='$tipo', USUBORRADOR='$borrador' where USUID = $id;";
        $unir = mysqli_query($conexion, $actualizar);
        return $unir;
    }
    function eliminar(int $a)
    {
        $conexion = conexion();
        $eliminar= "delete from usuarios where USUID = $a;";
        $unir = mysqli_query($conexion, $eliminar);
	    return $unir;   
        $actualizar = "update asignatura set USUBORRADOR='0' where USUID = $a;";
        $unir1 = mysqli_query($conexion, $actualizar);
	    return $unir1;   
    }
    function buscarUsuario(string $usuario, string $contra)
    {                
        $conexion = conexion();
        $buscarUsuario = "SELECT USUUSUARIO,USUCLAVE FROM usuarios WHERE USUUSUARIO='$usuario' && USUCLAVE='$contra'";
        $unir = mysqli_query($conexion, $buscarUsuario);
	    return $unir;   
    }
    function buscar(string $nombre)
    {                
        $conexion = conexion();
        $buscar = "Select * from usuarios where USUNOMBRE like '$nombre%';";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;   
    }
?>
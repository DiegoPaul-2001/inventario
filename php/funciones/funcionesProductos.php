<?php  
    function conexion (){
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $basedatos = "inventario";
        $conectar = mysqli_connect($servidor, $usuario, $clave,$basedatos) or die("conexion fallida");
        return $conectar;
    }
    function insertar($categoria,$provedor,$codigo,$nombre,$valor,$valTipo,$estado){
            $conexion = conexion();          
            $insertar = "insert into productos values(NULL,$categoria,$provedor,'$codigo','$nombre',$valor,'$valTipo','$estado','1')";
            $unir = mysqli_query($conexion, $insertar);
            return $unir;   
    }        
    function consultarTodos(){
        $conexion = conexion();
        $buscar = "select PROID,CATID,PRVID,PROCODIGO,PRONOMBRE,PROVALOR,PORVALTIPO,PROESTADO,PROBORRADO FROM productos WHERE PROBORRADO = 1";
        $unir = mysqli_query($conexion, $buscar);
	    return $unir;        
    }
    function buscarPorId(int $id)
    {                
        $conexion = conexion();       
        $buscarporid = "select PROID,CATID,PRVID,PROCODIGO,PRONOMBRE,PROVALOR,PORVALTIPO,PROESTADO,PROBORRADO FROM productos WHERE PROID = $id;";
        $unir = mysqli_query($conexion, $buscarporid);
        return $unir;
    }
    function actualizar(int $categoria,int $provedor, string $codigo,string $nombre,double $valor,string $valTipo,string $estado)
    {
        $conexion = conexion();       
        $actualizar = "update productos SET CATID = $categoria,PRVID=$provedor,PROCODIGO='$codigo',`PRONOMBRE`='$nombre',PROVALOR='$valor',PORVALTIPO='$valTipo',PROESTADO='$estado'WHERE PROID =  $id";
        $unir = mysqli_query($conexion, $actualizar);
        return $unir;
    }
    function eliminar(int $a)
    {
        $conexion = conexion();  
        $eliminar = "update productos set PROBORRADO = 0 where PROID = $a;";
        $unir = mysqli_query($conexion, $eliminar);
	    return $unir;   
    }
    function buscarCategorias()
{
    $conexion = conexion();
    $categorias = "Select c.catid,c.catnombre From categorias c where c.catestado = 'Activo 'and c.catborrado = 1";
    $unir = mysqli_query($conexion, $categorias);
    return $unir;
}
function buscarProvedores()
{
    $conexion = conexion();
    $categorias = "Select p.prvid,p.prvnombre From provedor p where p.prvborrado = 1";
    $unir = mysqli_query($conexion, $categorias);
    return $unir;
}
?>
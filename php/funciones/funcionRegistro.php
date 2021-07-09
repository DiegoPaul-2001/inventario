<?php
function conexion()
{
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basedatos = "inventario";
    $conectar = mysqli_connect($servidor, $usuario, $clave, $basedatos) or die("conexion fallida");
    return $conectar;
}
function insertarRegistro($bodega, $productos, $usuarios, $cantidad, $fecha)
{
    $conexion = conexion();
    $insertar = "insert into registro_productos values(NULL,'$bodega','$productos','$usuarios','$cantidad','$fecha')";
    $unir = mysqli_query($conexion, $insertar);
    return $unir;
}
function modificarRegistro($id, $bodega, $productos, $usuarios, $cantidad, $fecha)
{
    $conexion = conexion();
    $actualizar = ("update registro_productos set bodid='$bodega', proid='$productos',usuid='$usuarios',regcantidad='$cantidad', regfecha='$fecha' where regid='$id'");
    $unir = mysqli_query($conexion, $actualizar);
    return $unir;
}

function eliminarRegistro($id)
{
    $conexion = conexion();
    $query = ("delete from registro_productos where egdid='$id'");
    $r = mysqli_query($conexion, $query);
    return $r;
}

function buscarPorId(int $id)
{
    $conexion = conexion();
    $buscarporid = "Select * from registro_productos where regid='$id'";
    $unir = mysqli_query($conexion, $buscarporid);
    return $unir;
}

function BuscarTodosRegistro()
{
    $conexion = conexion();
    $buscar = "select r.regid , b.bodnombre,pronombre,u.usunombre,r.regcantidad,r.regfecha   
    from registro_productos r,bodegas b, productos p, usuarios u 
    where r.bodid=b.bodid and r.proid=p.proid and r.usuid=u.usuid";
    $unir = mysqli_query($conexion, $buscar);
    return $unir;
}
function buscarBodegas()
{
    $conexion = conexion();
    $buscarporid = "Select b.BODID, b.BODNOMBRE From bodegas b";
    $unir = mysqli_query($conexion, $buscarporid);
    return $unir;
}
function buscarProductos()
{
    $conexion = conexion();
    $buscarporid = "Select p.PROID, p.PRONOMBRE From productos p";
    $unir = mysqli_query($conexion, $buscarporid);
    return $unir;
}

function buscarUsuarios()
{
    $conexion = conexion();
    $buscarporid = "Select u.USUID, u.USUNOMBRE From usuarios u";
    $unir = mysqli_query($conexion, $buscarporid);
    return $unir;
}

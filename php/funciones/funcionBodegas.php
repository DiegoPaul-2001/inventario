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
function insertBodegas($nombre, $telefono, $direccion, $borrado)
{
    $conexion = conexion();
    $query = ("Insert into bodegas values(0,'$nombre','$telefono','$direccion','$borrado')");
    $r = mysqli_query($conexion, $query);
    return $r;
}

function modificarBodegas($id, $nombre, $telefono, $direccion, $borradoo)
{
    $conexion = conexion();
    $actualizar = ("update bodegas set bodnombre='$nombre', bodtelefono='$telefono',boddireccion='$direccion',bodborrado='$borradoo' where bodid='$id'");
    $unir = mysqli_query($conexion, $actualizar);
    return $unir;
}

function eliminarBodegas($id)
{
    $conexion = conexion();
    $query = ("delete from bodegas where bodid='$id'");
    $r = mysqli_query($conexion, $query);
    return $r;
}

function buscarPorId(int $id)
{
    $conexion = conexion();
    $buscarporid = "Select * from bodegas where bodid='$id'";
    $unir = mysqli_query($conexion, $buscarporid);
    return $unir;
}

function BuscarTodosBodegas()
{
    $conexion = conexion();
    $buscar = "select b.bodid,b.bodnombre,b.bodtelefono,b.boddireccion from bodegas b";
    $unir = mysqli_query($conexion, $buscar);
    return $unir;
}

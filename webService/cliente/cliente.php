<?php

if (isset($_GET)) {   
    $accion = $_GET['accion'];
    try {
        $cliente = new SoapClient('http://localhost/inventario/webService/server/wsdl.xml');

        if ($accion == "guardar") {
            $nombre = $_GET['nombre'];
            $descripcion = $_GET['descripcion'];
            $telefono = $_GET['telefono'];
            $correo = $_GET['correo'];
            if ($id == null) {
                if ($cliente->insertar($nombre, $descripcion, $telefono,$correo))
                    echo "Usuario guardado correctamente";
                else
                    echo "Usuario No guardado correctamente";
            } 
        }
    } catch (SoapFault $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
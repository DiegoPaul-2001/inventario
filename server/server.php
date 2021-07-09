<?php
    class wsEjemplo{
        function insertar(string $nombre, string $descripcion, string $telefono,string $correo):int{
                 include "../conectar/conectar.php";            
                 return $db->query("insert into provedor values(NULL,'$nombre','$descripcion','$telefono','$correo')");                
    }         
}
try{
    $server = new SoapServer('http://localhost/inventario/server/wsdl.xml');
    $server->setClass('wsEjemplo');
    $server->handle();
}catch(SOAPFault $f){
    print $f->faultstring;
}
?>
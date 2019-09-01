<?php
require_once('../lib/nusoap.php');
// direccion del WSDL URL del servidor cambiar por la ip o nombre del server
$wsdl = "http://localhost:80/DW/2019/servicio.php?wsdl";

// crear el objeto de cliente
$client = new nusoap_client($wsdl, 'wsdl');
$err = $client->getError();
if ($err) {
   // Si hay error despliga el tag html del mismo
   echo '<h2>Error en la construccion</h2>' . $err;
   // At this point, you know the call that follows will fail
   exit();
}

// Call the hello method
$result1=$client->call('Saludar', array('nombre'=>'Cristofer'));
print_r($result1).'RESULTDO!!!!!\n';
?>
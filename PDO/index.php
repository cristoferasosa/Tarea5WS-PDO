<?php
//including the database connection file
include_once("config.php");

//lista los usuairos en orden
//$result = $dbConn->query("SELECT * FROM usuarios ORDER BY id DESC");
//consumir



?>

<html>
<head>	
	<title>Usuarios</title>
</head>

<body>
<a href="add.html">Agregar Nueva Información</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Edad</td>
		<td>Email</td>
		<td>Actualizar</td>
	</tr>
	<?php 
	require_once('lib/nusoap.php');
	// direccion del WSDL URL del servidor cambiar por la ip o nombre del server
	$wsdl = "http://localhost:81/2019/servicio.php?wsdl";
	
	// crear el objeto de cliente
	$client = new nusoap_client($wsdl, 'wsdl');
	$err = $client->getError();
	if ($err) {
	   // Si hay error despliga el tag html del mismo
	   echo '<h2>Error en la construccion</h2>' . $err;
	   // At this point, you know the call that follows will fail
	   exit();
	}	
	//while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		// Call the hello method
		$result1=$client->call('obtenerdatos', array());
		//print_r($result1).'RESULTDO!!!!!\n';//}
		echo $result1;
		print_r($result1);
	?>
	</table>
</body>
</html>

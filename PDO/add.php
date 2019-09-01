<html>
<head>
	<title>Agregar Datos de Usuario</title>
</head>

<body>
<?php
//Incluye el archivo de ocnfiguración
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['nombre'];
	$age = $_POST['edad'];
	$email = $_POST['email'];
		
	// chequear datos vacios
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>El nombre está en blanco.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>la Edad está en blanco.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email está en blanco.</font><br/>";
		}
		
		//lleva a la pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		// si todos los campos están llenos
			
		//inserta datos
		$sql = "INSERT INTO usuarios (nombre, edad, email) VALUES(:name, :age, :email)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $name);
		$query->bindparam(':age', $age);
		$query->bindparam(':email', $email);
		$query->execute();
		
		//display success message
		echo "<font color='green'>Datos Agregados Exitósamente.";
		echo "<br/><a href='index.php'>Ver Resultados</a>";
	}
}
?>
</body>
</html>

<?php
//incluyend la libreria de nusopa
require_once('lib/nusoap.php');
//including the database connection file
include_once("config.php");

//configurand el web service
$server= new soap_server();
$server->configureWSDL("SaludoXML","urn:SaludoXMLwsdl");
$server->wsdl->schemaTargetNamespace=("urn:SaludoXMLwsdl");

//muestra funcion que proporcionaremos
function Saludar($nombre){
    return '... and the new rockstar of web pages course is :'.trim($nombre);
}
function obtenerdatos($id)
{

    $sql = "SELECT * FROM tb_solicitud WHERE id =".$id;
    $result = $dbConn->query("SELECT * FROM usuarios ORDER BY id ASC ");

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$resul= "<td>".$row['nombre']."</td>";

		/*$result= $result."<td>".$row['edad']."</td>";
		$result= $result. "<td>".$row['email']."</td>";	
		$result= $result. "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Está seguro de Eliminar el Registro?')\">Borrar</a></td>";
	    */
    }
    return $resul;
}
//registrando nuestra funcion saludar con su parametro nombre
$server->register(
    'Saludar', //nombre del metodo
    array('nombre'=>'xsd:string'),//parametros de entrada
    array('return'=>'xsd:string'),//parametros de salida
    'urn:SaludoXMLwsdl',//nombre del workspace
    'urn:SaludoXMLwsdl#Saludar',//Accion soap
    'rpc',//estilo
    'encoded',//uso
    'Saluda a la persona'//
);
if(!isset($HTTP_RAW_POST_DATA))
    $HTTP_RAW_POST_DATA=file_get_contents('php://input');

$server->service($HTTP_RAW_POST_DATA);
?>
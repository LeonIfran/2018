<?php
require_once ("Entidades/producto.php");
require_once ("Entidades/archivo.php");

//var_dump($_POST);
//var_dump($_FILES);
$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

switch($queHago){


	case "Subir":

		$respuestaDeSubir = Archivo::Subir();

		if(!$respuestaDeSubir["Exito"]){
			echo "error " .$respuestaDeSubir["Mensaje"];
			break;
		}
		$archivo = $respuestaDeSubir["PathTemporal"];
		echo "Bien " ;
		
		$legajo = isset($_POST['legajo']) ? $_POST['legajo'] : NULL;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
		//$archivo = $res["PathTemporal"];
		$archivo = $respuestaDeSubir["PathTemporal"];

		$p = new Alumno($legajo, $nombre, $archivo);
		
		//$p = new Alumno(666, "Jamon del diablo",$archivo );

		if(!Alumno::Guardar($p)){
			echo "Error al generar archivo";
			break;
		}
	

	
		
		break;
		
	case "eliminar":
		$legajo = isset($_POST['legajo']) ? $_POST['legajo'] : NULL;
	
		if(!Alumno::Eliminar($legajo)){
			$mensaje = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		}
		else{
			$mensaje = "El archivo fue escrito correctamente. Alumno eliminado CORRECTAMENTE!!!";
		}
	
		echo $mensaje;
		
		break;
		
	default:
		echo ":(";
}
?>
<?php
class Alumno
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $legajo;
 	private $nombre;
  	private $pathFoto;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function Getlegajo()
	{
		return $this->legajo;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetPathFoto()
	{
		return $this->pathFoto;
	}

	public function Setlegajo($valor)
	{
		$this->legajo = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetPathFoto($valor)
	{
		$this->pathFoto = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($legajo=NULL, $nombre=NULL, $pathFoto=NULL)
	{
		if($legajo !== NULL && $nombre !== NULL){
			$this->legajo = $legajo;
			$this->nombre = $nombre;
			$this->pathFoto = $pathFoto;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->legajo." - ".$this->nombre." - ".$this->pathFoto."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodosLosAlumnos()
	{

		$ListaDeAlumnosLeidos = array();

		//leo todos los Alumnos del archivo
		$archivo=fopen("archivos/alumno.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$Alumnos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$Alumnos[0] = trim($Alumnos[0]);
			if($Alumnos[0] != ""){
				$ListaDeAlumnosLeidos[] = new Alumno($Alumnos[0], $Alumnos[1],$Alumnos[2]);
			}
		}
		fclose($archivo);
		
		return $ListaDeAlumnosLeidos;
		
	}
	public static function Modificar($obj)
	{
		$resultado = TRUE;
		
		$ListaDeAlumnosLeidos = Alumno::TraerTodosLosAlumnos();
		$ListaDeAlumnos = array();
		$imagenParaBorrar = NULL;
		
		for($i=0; $i<count($ListaDeAlumnosLeidos); $i++){
			if($ListaDeAlumnosLeidos[$i]->legajo == $obj->legajo){//encontre el modificado, lo excluyo
				$imagenParaBorrar = trim($ListaDeAlumnosLeidos[$i]->pathFoto);
				$ListaDeAlumnosLeidos[$i] = $obj;
				//continue;
			}
			//$ListaDeAlumnos[$i] = $ListaDeAlumnosLeidos[$i];
		}

		//array_push($ListaDeAlumnos, $obj);//agrego el Alumno modificado
		
		//BORRO LA IMAGEN ANTERIOR
		unlink("archivos/".$imagenParaBorrar);
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeAlumnosLeidos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function Eliminar($legajo)
	{
		if($legajo === NULL)
			return FALSE;
			
		$resultado = TRUE;
		
		$ListaDeAlumnosLeidos = Alumno::TraerTodosLosAlumnos();
		$ListaDeAlumnos = array();
		$imagenParaBorrar = NULL;

		$alumnoBorrado = NULL;
		$fechaBorrado = date("Ymd_His");
		

		for($i=0; $i<count($ListaDeAlumnosLeidos); $i++){
			if($ListaDeAlumnosLeidos[$i]->legajo == $legajo){//encontre el borrado, lo excluyo
				$alumnoBorrado = $ListaDeAlumnosLeidos[$i];//le asigno el alumno para escribirlo en alumnosborrados
				$imagenParaBorrar = trim($ListaDeAlumnosLeidos[$i]->pathFoto);
				continue;
			}
			$ListaDeAlumnos[$i] = $ListaDeAlumnosLeidos[$i];
		}

		//BORRO LA IMAGEN ANTERIOR
		//unlink("archivos/".$imagenParaBorrar);
		
		//http://php.net/manual/en/function.rename.php
		$extension = pathinfo($imagenParaBorrar, PATHINFO_EXTENSION);
		rename("archivos/fotos/".$imagenParaBorrar,"archivos/fotosBorradas/".$fechaBorrado.".".$extension);

		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeAlumnos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		$ar2 = fopen("archivos/alumnosborrados/alumnos.txt","a");
		$cant2 = fwrite($ar2,$alumnoBorrado->ToString());
		fclose($ar2);
		return $resultado;
	}
//--------------------------------------------------------------------------------//
}
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
		  //return $this->legajo." - ".$this->nombre." - ".$this->pathFoto;
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
/* 		if ($obj !="\r\n" && !(empty($obj)))
		{
			$cant = fwrite($ar, $obj->ToString());
		} */
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
			if (isset($Alumnos[2])) 
			{
				$Alumnos[2] = trim($Alumnos[2]);
			}
			
			if($Alumnos[0] != "")
			{
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
		foreach($ListaDeAlumnosLeidos AS $item)
		{
	/* 		if($auto[0]!=""){
				$dato=$auto[0] ."=>".$auto[1]."\n" ;
			 fwrite($archivo, $dato);
		}	 	 */
			if (!(empty($item))) 
			{
				$cant = fwrite($ar, $item->ToString());
			}
			
			
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

		$resultado = TRUE;
		$contador=0;
				
		//OBTENGO TODOS LOS AlumnoS
		$Alumnos = Alumno::TraerTodosLosAlumnos();
		//RECORRO Y BUSCO LA IMAGEN ANTERIOR.
		foreach($Alumnos as $item) {
					
			if($item->legajo == $legajo) {
					
				$imagen = trim($item->pathFoto);
				unset($Alumnos[$contador]);
				break;
			}
					
			$contador++;
		}
		//BORRO LA IMAGEN ANTERIOR
		$ruta = "archivos/fotos/".$imagen;
		Archivo::Borrar($ruta);
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/alumno.txt" , "w");
		//ESCRIBO EN EL ARCHIVO
		foreach($Alumnos as $Alumno) 
		{
			echo $Alumno->ToString();
			fwrite($ar , $Alumno->tostring());
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
				
		return $resultado;
	}
//--------------------------------------------------------------------------------//
}
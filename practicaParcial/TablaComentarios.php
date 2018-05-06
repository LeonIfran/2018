<?php 
/* 5- (2pt.) TablaComentarios.php, puede recibir datos del comentario como el usuario, el titulo o nada para hacer 
una busqueda, y retornará una tabla con: (la imagen del comentario, el titulo , la edad del usuario y el nombre)*/  
require_once "UsuarioCargaTxt.php";
class Tabla
{
    public static function traerTabla($buscar)
    {
        $arrMostrar = array();
        $comBusqueda = Tabla::TraerComentarios();
        foreach ($comBusqueda as $value) 
        {
            echo var_dump($value);
            //array_search($buscar,$value);
            if (array_search($buscar,$value) != FALSE) 
            {
                array_push($arrMostrar,$value);
            }
        }
        echo var_dump($arrMostrar);
    }
    public static function TraerComentarios()
    {
        $arrComentarios=array();
        $strAux ="";
        $com;
        $recurso=fopen("Comentario.txt","r");
        if ($recurso===FALSE) 
        {
           echo "error no se pudo abrir el archivo<br>";
        }
        else 
        {
            while (!feof($recurso)) 
            {
                $strAux = trim(fgets($recurso));//obtengo una linea (fgets), le hago trim y la asigno
                $com = explode("--",$strAux);//quito los delimitadores '--'(con el f explode)
                if ($com[0] != "" /* && strlen($com[0])>1 */) 
                {
                   array_push($arrComentarios,$com);
                }
            }
            fclose($recurso);
        }
        return $arrComentarios;


    }
}
//echo var_dump(Tabla::TraerComentarios());
Tabla::traerTabla('noel@ymail.com');
?>
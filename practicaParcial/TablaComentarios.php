<?php 
/* 5- (2pt.) TablaComentarios.php, puede recibir datos del comentario como el usuario, el titulo o nada para hacer 
una busqueda, y retornará una tabla con: (la imagen del comentario, el titulo , la edad del usuario y el nombre)*/  
require_once "UsuarioCargaTxt.php";
class Tabla
{
    public static function Busqueda($buscar)
    {
        $arrMostrar = array();
        $comBusqueda = Tabla::TraerComentarios();//traigo todos los comentarios
        foreach ($comBusqueda as $value) 
        {
            //echo var_dump($value);
            //array_search($buscar,$value);
            //echo var_dump(array_search($buscar,$value));
            if (array_search($buscar,$value) !== FALSE)//veo si hay coincidencia con la busqueda
            {
                //echo var_dump(array_search($buscar,$value));
                array_push($arrMostrar,$value);//si la hay pongo el array
            }
            elseif ($buscar ==='')//si no puso nada en la comparasion traigo todos los comentarios
            {
                array_push($arrMostrar,$value);
            }
        }
        //echo var_dump($arrMostrar);
        return $arrMostrar;
        //Tabla::CrearTablas($arrMostrar);
    }

    public static function CrearTablas($comentarios)
    {
        //$imagenes = scandir("./ImagenesDeComentario");
        $img;
        $tabla = "<table border=1>
                    <tbody>
                        <thead>
                            <th>Usuario</th>
                            <th>titulo</th>
                            <th>Comentario</th>
                            <th>Imagen</th>
                        </thead>";
        foreach ($comentarios as $value) 
        {

            $img = glob("./ImagenesDeComentario/$value[1].*");//busco la imagen usando el titulo como base
            $tabla=$tabla."<tr>
            <td>$value[0]</td>
            <td>$value[1]</td>
            <td>$value[2]</td>
            <td><img src='{$img[0]}' width='100px' height='100px'></td>
            </tr>";
        }
        $tabla=$tabla."</tbody></table>";
        echo $tabla;
    }

    public static function TraerComentarios()
    {
        $arrComentarios=array();
        $strAux = "";
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
//Tabla::Busqueda('algo');
//$re=Tabla::Busqueda('algo');
//Tabla::CrearTablas($re);
?>
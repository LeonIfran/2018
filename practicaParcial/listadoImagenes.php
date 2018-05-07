<?php 
/* 9- (2pts.) ListadoDeImagenes.php(por POST), debe recibir una opcion para saber si muestra las fotos cargadas o 
las borradas */
require_once "TablaComentarios.php";
class ListadoDeimagenes
{
    public static function Listado($opcion)
    {
        $img=array();
        if ($opcion==="borradas") 
        {
            echo "emntro";
            //$img = glob("./backUpFotos/$value[1].*");//busco la imagen usando el titulo como base
            $img = glob("./backUpFotos/*.{jpeg,jpg,png,gif}",GLOB_BRACE);
        }
        else
        {
           // $img = glob("./ImagenesDeComentario/$value[1].*");//busco la imagen usando el titulo como base
           $img = glob("./ImagenesDeComentario/*.{jpg,png,gif}",GLOB_BRACE);
        }
        echo var_dump($img);
        foreach ($img as $key => $value) 
        {
            echo "<img src='{$value}' width='100px' height='100px'>";
        }
    }
}
ListadoDeimagenes::Listado("borradas");
?> 
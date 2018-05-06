<?php 
/* 4- (2pts.) AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la 
carpeta /ImagenesDeComentario.  */
require_once "AltaComentario.php";
class AltaImagen extends Alta
{
    public static function AltaComentarioImagen($mail,$titulo,$comentario)
    {
        $ruta = "./ImagenesDeComentario/";
        mkdir($ruta);
        $extension = pathinfo($_FILES["archivo"]["name"],PATHINFO_EXTENSION);
        $nombrePath = $ruta.$titulo.".".$extension;
        if((parent::AltaComentario($mail,$titulo,$comentario))==TRUE)
        {
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"],$nombrePath)) 
            {
                echo "todo ok";
            }
        }
    }
}
AltaImagen::AltaComentarioImagen($_POST["email"],$_POST["titulo"],$_POST["comentario"]);
?>
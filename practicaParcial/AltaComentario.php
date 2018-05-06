<?php
/* 3- (1pts.) AltaComentario.php: (por POST)se recive el email del usuario y el titulo del  comentario y en 
comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.   */
require_once "VerificarUsuario.php";
class Alta
{
    public static function AltaComentario($mail,$titulo,$comentario)
    {
        //Verificar::Verificar($mail,"");
        if ((Verificacion::Verificar($mail))==TRUE) 
        {
            $parrafo=$mail."--".$titulo."--".$comentario."|\r\n";
            $recurso=fopen("./Comentario.txt","a");
            fwrite($recurso,$parrafo);
            fclose($recurso);
            return TRUE;
        }
    }
}
//Alta::AltaComentario($_POST["email"],$_POST["titulo"],$_POST["comentario"]);
?>
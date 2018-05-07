<?php 
/* 8- (1pts.) BorrarUsuario.php(por POST), debe recibir los datos de un usuario  de perfil “admin” y el titulo del 
comentario, de ser todos los datos correctos borrar el comentario y mover la foto a la carpeta backUpFotos y  
colocarle al nombre la fecha de hoy.  */
require_once "VerificarUsuario.php";
require_once "tablaComentarios.php";
class Borrar
{
    public static function BorrarComentario($mail,$contraseña,$titulo)
    {
        $ver = Verificacion::Verificar($mail,$contraseña);
        $perfil= Verificacion::traerPerfil($mail);
        $arrCom=array();
        $recurso;
        $img=NULL;
        $extension = NULL;
        if ($ver=="Bienvenido" && $perfil == "admin") 
        {
            $arrCom=Tabla::TraerComentarios();
            foreach ($arrCom as $key=>$value) 
            {
                if ($titulo===$value[1]) 
                {
                    echo "entro a la condicion<br>";
                    //echo var_dump($arrCom[$key]);
                    $img = glob("./ImagenesDeComentario/$value[1].*");//traigo la imagen
                    //echo var_dump($img);
                    unset($arrCom[$key]);
                    //$img = glob("./ImagenesDeComentario/$titulo.*");
                    break;
                }
            }
            $recurso = fopen("./Comentario.txt","w");
            foreach ($arrCom as $key => $value) 
            {
                $parrafo=$value[0]."--".$value[1]."--".$value[2]."\r\n";
                fwrite($recurso,$parrafo);

            }
            fclose($recurso);
            if ($img!==NULL) 
            {
                //$fechaBorrado = date("Ymd_His");
                $fecha=date("Ymd_His");
                //unlink($img[0]);
                //rename("archivos/fotos/".$imagenParaBorrar,"archivos/fotosBorradas/".$fechaBorrado.".".$extension);
                rename($img[0],"./backUpFotos/".$fecha.".jpeg");
            }

        }
    }
}
borrar::BorrarComentario("zoel@ymail.com","gato","com");
//doel@ymail.com--otra vez--mundo estas bien?|
//yoel@gmail.com - perro - yoel - usuario - 33
//zoel@ymail.com - gato - zoel - admin - 23


?>
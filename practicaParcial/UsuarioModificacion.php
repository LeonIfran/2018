<?php 
/* 6- (2pts.) UsuarioModificacion.php: (por POST)se ingresarán todos los valores necesarios (incluida una imagen) 
para realizar los cambios en los datos de cualquier usuario usuario.  */
require_once "UsuarioCargaTXT.php";
require_once "VerificarUsuario.php";
class Modificar extends Usuario
{
    public static function ModificarUsuarios($mail,$cla,$nom,$per,$ed)
    {
        $ruta = "./ImagenesDeUsuarios/";
        //mkdir($ruta);
        $extension = pathinfo($_FILES["imagenUS"]["name"],PATHINFO_EXTENSION);
        $imagen;
        $subidaOK=FALSE;
        $arrUsuarios = parent::TraerUsuarios();
        foreach ($arrUsuarios as $key=>$item) 
        {
            if ($item->getEmail() == $mail) 
            {

                    //sobrescribo el subindice con un usuario que creo a partir de los datos que le pase a la funcion
                    $arrUsuarios[$key]=new usuario($mail,$cla,$nom,$per,$ed);
                    $imagen = $ruta.$item->getEmail().".".$extension;
                    //echo $imagen;
                    //echo var_dump($arrUsuarios);
                    if (move_uploaded_file($_FILES["imagenUS"]["tmp_name"],$imagen)) 
                    {
                        $subidaOK = TRUE;
                        break;
                    }
            }
        }
        if ($subidaOK==TRUE) 
        {
            echo "ok";
            Usuario::GuardarLista($arrUsuarios);
        }
    }
}
Modificar::ModificarUsuarios("yoel@gmail.com","perro","umbreon","usuario","23");
//yoel@gmail.com - perro - yoel - usuario - 33

?>
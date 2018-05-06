<?php 
/*2- (1pts.) VerificarUsuario.php: (por POST)Se ingresa email y clave, si coincide con algún registro del archivo 
usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave. */
require_once "UsuarioCargaTXT.php";
 class Verificacion
{
    public static function Verificar($correo,$clave="")
    {
        $bandUsuario = FALSE;
        $usuarios = usuario::TraerUsuarios();
        foreach ($usuarios as $item) 
        {
            if ($item->getEmail() == $correo) 
            {
                $bandUsuario = TRUE;
                if ($item->getclave() == $clave) 
                {
                    //echo "Bienvenido";
                    return "Bienvenido";
                    //break;esta al pedo porque ya tengo 
                }
                else 
                {
                    echo "Contraseña Incorrecta<br>";
                    break;
                }
            }
            else 
            {
                $bandUsuario = FALSE;
            }
        }
        if ($bandUsuario==FALSE) 
        {
            echo "el usuario no existe";
        }
        else
        {
            echo "El usuario $correo existe<br>";
            //return $correo;
            return TRUE;
        }

    }

}
//echo Verificacion::Verificar($_POST["email"],$_POST["clave"]);
?>
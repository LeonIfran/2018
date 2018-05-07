<?php 
/* 7- (2pts.) UsuarioModificacionValidado.php: (por POST)se ingresarán todos los valores necesarios (incluida una 
imagen) para realizar los cambios en los datos del usuario, si el usuario es admin puede hacer los cambios en 
cualquier usuario, de lo contrario solo puede cabiar los datos propios unicamente.  */
require_once "UsuarioModificacion.php";
class ModificacionValidado
{
    public static function ModificacionValidar($mail,$cla,$nom,$per,$ed)
    {
        $respuesta;
        if ($per=="admin") 
        {
            echo "bienvenido Admin<br>";
            Modificar::ModificarUsuarios($mail,$cla,$nom,$per,$ed);
        }
        else if ($per=="usuario") 
        {
            $respuesta = Verificacion::Verificar($mail,$cla);
            if ($respuesta == "Bienvenido") 
            {
                Modificar::ModificarUsuarios($mail,$cla,$nom,$per,$ed);
            }
        }
    }
}
ModificacionValidado::ModificacionValidar("zoel@ymail.com","gato","bo","admin","36");
//zoel@ymail.com - gato - zoel - admin - 23


?>
<?php 
/*1- (1pt.) UsuarioCarga.php: (por GET)se ingresa nombre, email, perfil (“admin” o “user”), edad y clave. Se 
guardan los datos en en el archivo de texto usuarios.txt, tomando el mail como identificador . */
class Usuario
{
    private $_nombre;
    private $_email;
    private $_perfil;
    private $_edad;
    private $_clave;
    

    public function getEmail()
    {
        return $this->_email;
    }
    public function setEmail($value)
    {
        $this->_email = $value;
    }

    public function getclave()
    {
        return $this->_clave;
    }
    public function setclave($value)
    {
        $this->_clave = $value;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }
    public function setNombre($value)
    {
        $this->_nombre = $value;
    }
    public function getPerfil()
    {
        return $this->_perfil;
    }

    //constructor
    public function __construct($mail,$cla,$nom,$per,$ed)
    {
        if ($nom !== NULL && $mail !== NULL && $per !== NULL && $ed !== NULL && $cla !== NULL) 
        {
            $this->_nombre = $nom;
            $this->_email = $mail;
            $this->_perfil = $per;
            $this->_edad = $ed;
            $this->_clave = $cla;
        }
    }
    public function ToString()
    {
        $arr=$this->_email." - ".$this->_clave." - ".$this->_nombre." - ".$this->_perfil." - ".$this->_edad;
        return $arr;
        
    }

    public static function Guardar($obj)
    {
        //echo var_dump($obj);
        if (!($recurso = fopen("prueba.txt","a"))) 
        {
            echo "error";
        }
        else
        {
            fwrite($recurso,$obj->ToString()."\r\n");
            fclose($recurso);
        }
        
    }
    public static function GuardarLista($arr)
    {
        $recurso = fopen("prueba2.txt","w");
        foreach ($arr as $key => $value) 
        {
            if ($value!==NULL) 
            {
                fwrite($recurso,$value->ToString()."\r\n");
            }
            
        }
        fclose($recurso);
    }

    Public static function TraerUsuarios()
    {
        $usuarios = array();
        $strAUX = "";
        if (!($recurso = fopen("prueba.txt","r"))) 
        {
            echo "error, no se pudo leer la lista de usuarios";
        }
        else 
        {
            while (!feof($recurso)) 
            {
                $strAUX = trim(fgets($recurso));
                //echo var_dump($strAUX)."<br>";
                $usu = explode(" - ",$strAUX);
                //echo var_dump($usu)."<br>";
                if ($usu[0] != "") 
                {
                    array_push($usuarios,new usuario($usu[0],$usu[1],$usu[2],$usu[3],$usu[4]));
                }
                
            }
            fclose($recurso);
            //echo var_dump($usuarios);
            return $usuarios;
        }
    }

}

//$miUsuario= new usuario($_GET["nombre"],$_GET["email"],$_GET["perfil"],$_GET["edad"],$_GET["clave"]);
//$miUsuario= new usuario("noel@ymail.com","zorro","noel","usuario","20");
//$miUsuario::Guardar($miUsuario);
//$miUsuario::TraerUsuarios();
?>
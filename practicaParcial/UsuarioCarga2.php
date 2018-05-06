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
    public $miJson;

    public function getEmail()
    {
        return $this->_email;
    }
    public function setEmail($value)
    {
        $this->_email=$value;
    }

    public function getclave()
    {
        return $this->_clave;
    }
    public function setclave($value)
    {
        $this->_clave=$value;
    }

    //constructor
    public function __construct($nom,$mail,$per,$ed,$cla)
    {
        if ($nom !== NULL && $mail !== NULL && $per !== NULL && $ed !== NULL && $cla !== NULL) 
        {
            $this->_nombre=$nom;
            $this->_email=$mail;
            $this->_perfil=$per;
            $this->_edad=$ed;
            $this->_clave=$cla;
            //$this->Guardar();
        }
    }
    public function ToArray()
    {
        $arr=array(
        'email'=>$this->_email,
        'nombre'=>$this->_nombre,
        'perfil'=>$this->_perfil,
        'edad'=>$this->_edad,
        'clave'=>$this->_clave,
        );
        echo var_dump($arr);
        return $arr;
        
    }
    public static function Guardar($obj)
    {
        $auxArr=array();
        $auxArr2=array();
        
        $auxArr=$obj->ToArray();
        
/*         if (file_exists("pruebaJSON.txt") && filesize("pruebaJSON.txt")>0) 
        { */
            $reader=fopen("pruebaJSON.txt","r");
            $strAUX=fread($reader,filesize("pruebaJSON.txt"));
            if (strlen($strAUX)>0) 
            {   echo "entro";
                $auxArr=json_decode($strAUX,TRUE);
                $auxArr2=$obj->ToArray();
                array_push($auxArr,$auxArr2);
            }

            fclose($reader);
        /* } */
        

        $recurso=fopen("pruebaJSON.txt","w");
       
        //fwrite($recurso,json_encode($obj->ToArray()));
        fwrite($recurso,json_encode($auxArr));
        fclose($recurso);
    }
}
/* $_GET["nombre"];
$_GET["email"];
$_GET["perfil"];
$_GET["edad"];
$_GET["clave"]; */
//$miUsuario= new usuario($_GET["nombre"],$_GET["email"],$_GET["perfil"],$_GET["edad"],$_GET["clave"]);
$miUsuario= new usuario("noel","noel@ymail.com","usuario","20","zorro");

$miUsuario::Guardar($miUsuario);
?>
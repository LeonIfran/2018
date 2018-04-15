<?php 
//la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
class Enigma
{
    public static function Encriptar($mensaje,$path)
    {
        $aux;
        $len = strlen($mensaje);
        //echo var_dump($mensaje);
        for ($i=0; $i < $len; $i++)//recorro el string por subindices
        {   //echo $mensaje[$i]."<br>";
            $aux[$i] = (ord($mensaje[$i])+200);//tomo el character, lo paso a ascii y le sumo 200
            //echo $aux[$i]."<br>";
        }
        //echo var_dump($mensaje);
        $aux = implode(" ",$aux);
        //echo $aux;
        $escritor = fopen($path,"w");

        if (fwrite($escritor,$aux))
        {
            echo "se guardo con exito<br>";
            return TRUE;
        }
        else
        {
            echo "error<br>";
            return FALSE;
        }
        fclose($escritor);
    }

    public static function Desencriptar($path)
    {
/*         $auxDese;
        $auxFinal=NULL;
        $lector = fopen($path,"r");
        
        while (!feof($lector)) 
        {
            $auxLinea = fgets($lector);
            //echo $auxLinea."<br>";
            $auxLinea = trim($auxLinea);
            //echo $auxLinea."<br>";
            if ($auxLinea!="" && $auxLinea!=" " && $auxLinea!=NULL) 
            {
                $auxDese = $auxLinea-200;
            }
            echo $auxDese."<br>";

        }
        fclose($lector); */
                $auxDese;
        
        $lector = fopen($path,"r");
        
        
            $auxLinea = fgets($lector);
            $auxDese = explode(" ",$auxLinea);
            $aux;
            $len = count($auxDese);
            for ($i=0; $i < $len; $i++)
            {   
                $aux[$i] = chr($auxDese[$i]-200);
            }
            $aux = implode("",$aux);
            return $aux;
        
    }
}
$men = "asdf";
Enigma::Encriptar($men,"../misArchivos/contrasenia.txt");
echo Enigma::Desencriptar("../misArchivos/contrasenia.txt");
?>
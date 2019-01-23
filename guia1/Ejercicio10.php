<?php 
/*Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que 
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los 
Arrays de Arrays. */
$lapicera1=array('color'=>"rojo",'marca' => "vic",'trazo' => "fino",'precio'=> 3.97 );
$lapicera2= array('color' => "verde",'marca' => "pelican",'trazo' => "grueso",'precio'=> 2.35 );
$lapicera3= array('color'=> "azul",'marca'=>"ballpoint",'trazo'=>"fino",'precio'=>5);
$arraysUno=array('Array1'=>$lapicera1,'Array2'=>$lapicera2,'Array3'=>$lapicera3);
//echo var_dump($arraysUno);
foreach ($arraysUno as $key => $value) 
{
    echo $key."<br>";
    foreach ($value as $key2 => $value2) 
    {
        echo $key2." = ".$value2."<br>";
    }
    echo "---------------------------------------------<br>";
}
$lapicera4=array('color'=>"violeta",'marca' => "vic",'trazo' => "grueso",'precio'=> 4.27 );
$lapicera5= array('color' => "naranja",'marca' => "pelican",'trazo' => "fino",'precio'=> 5.45 );
$lapicera6= array('color'=> "dorado",'marca'=>"papermate",'trazo'=>"fino",'precio'=>6);
$arrayDos=array($lapicera4,$lapicera5,$lapicera6);
echo "<h2>este es el array con indices</h2>";
foreach ($arrayDos as $Llave => $valor) 
{
    echo "Posicion: ".$Llave."<br>";
    foreach ($valor as $llave2 => $valor2) 
    {
        echo $llave2." = ".$valor2."<br>";
    }
    echo "___________________________________________<br>";
}
?>
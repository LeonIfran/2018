<?php 
/*Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que 
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’.Crear, cargar y mostrar tres lapiceras. */ 
//$lapicera= array('color' => , );
//creo mis llaves asociativas

//echo var_dump($lapicera);
//$lapiceraUno=array();
$llaves=array('color','marca','trazo','precio');
$lapicera=array_fill_keys($llaves,0);
$lapicera['color']="rojo";
$lapicera['marca']="vic";
$lapicera['trazo']="fino";
$lapicera['precio']=3.97;
//echo var_dump($lapicera);
$lapicera2= array('color' => "verde",'marca' => "pelican",'trazo' => "grueso",'precio'=> 2.35 );
$lapicera3= array('color'=> "azul",'marca'=>"ballpoint",'trazo'=>"fino",'precio'=>5);
$lapiceras=array($lapicera,$lapicera2,$lapicera3);
foreach ($lapiceras as $value) 
{
    
    foreach ($value as $key => $value2) 
    {
        echo $key." = ".$value2."<br>";
    }
    echo "----------------------------------"."<br>";
    
}
?>
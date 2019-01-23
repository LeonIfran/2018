<?php 
/*Generar una aplicación que permita cargar los primeros 10 números impares en un Array. 
Luego imprimir (utilizando la estructura 
for
) cada uno en una línea distinta (recordar que el */
$arrayInpares=array();
$contadorWhile=0;
for ($i=0; $i < 20; $i++) 
{ 
   if ($i % 2 != 0) 
   {
       $arrayInpares[]=$i;
   }
}

echo "<h2>Mostrandolo con estructura For</h2>";
for ($i=0; $i <count($arrayInpares) ; $i++) 
{ 
    echo $arrayInpares[$i]."<br>";
}
echo "<h2>Mostrandolo con estructura while</h2>";
while ($contadorWhile < count($arrayInpares)) 
{
    echo $arrayInpares[$contadorWhile]."<br>";
    $contadorWhile++;
}
echo "<h2>Mostrandolo con estructura Foreach</h2>";
foreach ($arrayInpares as $valor) 
{
    echo $valor."<br>";
    unset($valor);
}
//echo var_dump($arrayInpares);
?>
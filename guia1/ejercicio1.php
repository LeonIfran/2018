<?php 
//variables
//aca va a ir la suma total
$sum=0;
$cont=1;
//este es un auxiliar
$aux=0;
//esta es una bandera para cuando la suma se pase de 1000
$sepaso=false;
do {
    $aux+=$cont; //sumo los numeros al auxiliar
    if ($aux>1000) //veo si el auxiliar se paso de 1000
    {
        $sepaso=true;//cambio la bandera si lo hizo.
    }
    else 
    {
        //caso contrario paso el auxiliar a la variable principal ($sum)
        $sum=$aux;
    }
    $cont++; //incremento el contador
} while ($sepaso==false);
echo "La Suma total es: ".$sum." Y se sumaron: ".$cont."  Numeros";

?>
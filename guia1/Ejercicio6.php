<?php 
/* Aplicación Nº 6 (Carga aleatoria)  
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la 
función 
rand
). Mediante una estructura condicional, determinar si el promedio de los números 
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el 
resultado. */
//$miarray= new array(rand(0,10));
$medio=0;
$resultado;
//cargo el array con 6 numeros elegidos al azar
$arrayAleatorio = array(rand(0,10),rand(0,10),rand(0,10),rand(0,10),rand(0,10),rand(0,10));
//echo var_dump($arrayAleatorio);
//Sumo todos los valores en el array (array_sum) y los divido por la cantidad de valores que posee (count)
$medio=array_sum($arrayAleatorio)/count($arrayAleatorio);
//echo $medio."<br>";

if ($medio>6) 
{
    $resultado="mayor";
} else if ($medio<6)
{
    $resultado="menor";
}
else
{
$resultado="Igual";
}
//aca voy a redondear el promedio a 3 decimales para que sea mas legible
echo "El promedio es: ".round($medio,3)."<br>"."Es ".$resultado." que seis";
?>
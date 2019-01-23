<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');

echo "Dia, Mes, Año<br>".date("d/m/y")."<br>";
echo "----------------------------------------<br>";
echo "Dia, Mes, Año Completo<br>".date("D/M/Y")."<br>";
echo "----------------------------------------<br>";
echo "Dia completo, Mes Completo, Hora, Minutos<br>".date("l. j. F. G:i")."<br>";
echo "----------------------------------------<br>";
$fecha=date("z");
if (0<$fecha && $fecha<80 || $fecha>355) 
{
    echo "La estacion Actual es Verano<br>";
}
else if($fecha>=80 && $fecha<172)
{
    
    echo "La estacion es Otoño<br>";
}
else if($fecha>=172 && $fecha<264)
{
    echo "La estacion actual es Invierno";
}
else if($fecha>=264 && $fecha<355)
{
    echo "La estacion actual es primavera";
}
else
{
    echo "Fecha incorrecta";
}
?>
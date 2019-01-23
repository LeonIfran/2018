<?php
$fecha=date("d-m-Y");
$año=date("Y");
if (strtotime($fecha)<strtotime("21-03-".$año)|| strtotime($fecha)>=strtotime("21-12-".$año))
{
 echo "Es verano";
}
else if (strtotime($fecha)<strtotime("21-12-".$año)&&strtotime($fecha)>=strtotime("21-09-".$año)) {
  echo "Es primavera";
}
else if (strtotime($fecha)<strtotime("21-09-".$año)&&strtotime($fecha)>=strtotime("21-05-".$año)) {
  echo "Es invierno";
}
else if (strtotime($fecha)<strtotime("21-05-".$año)&&strtotime($fecha)>=strtotime("21-03-").$año) {
  echo "es otoño";
}
 ?>

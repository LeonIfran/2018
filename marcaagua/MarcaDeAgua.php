<?php
$directorio = "./imagenes/";
$nombreArchivos = scandir($directorio);
$imagen1=$directorio.$nombreArchivos[2];
/* $im = imagecreatefrompng("fotoUno.png");
$estampa = imagecreatefrompng('fotoDos.png'); */
/* echo var_dump($imagen1);
echo $directorio.$nombreArchivos[3]; */
$im = imagecreatefrompng($directorio.$nombreArchivos[2]);
$estampa = imagecreatefrompng($directorio.$nombreArchivos[3]);

// Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
$margen_dcho = 10;
$margen_inf = 10;
$sx = imagesx($estampa);
$sy = imagesy($estampa);

// Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
// ancho de la foto para calcular la posición de la estampa. 
imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

// Imprimir y liberar memoria
header('Content-type: image/png');
imagepng($im);
//imagedestroy($im);


?>
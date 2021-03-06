<?php 
//require_once "../misArchivos/asas.txt";

/* Generar una aplicación que sea capaz de copiar un archivo de texto 
(su ubicación se ingresará por la página) hacia otro archivo que será creado y alojado en 
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso,  
mm al mes, dd al día, hh hora, ii minutos y ss segundos. 
Modificar el ejercicio anterior para que el contenido del archivo se copie de manera invertida, 
es decir, si el archivo origen posee ‘Hola mundo’ en el archivo destino quede ‘odnum aloH’.*/
$tiempo = new DateTime('now');
$nombre = $tiempo->format('Y_m_d_H_i_s').".txt";//aca pongo el nombre del txt
$directorio = "./misArchivos/";
$ruta = $directorio.$nombre;//aca combino la ruta 
$temporal = $_FILES["ArchivoASubir"]["tmp_name"];

$recursoLE = fopen($temporal,'r+');//abro el archivo temporañ
$texto = fread($recursoLE,filesize($temporal));//lo leo
$texto = strrev($texto);//invierto el texto
fclose($recursoLE);//cierro el recurso

$recursoLE = fopen($temporal,'w+');//abro el temporal para escritura
fwrite($recursoLE,$texto);//escribo el texto en reversa
fclose($recursoLE);//lo cierro

if (move_uploaded_file($_FILES["ArchivoASubir"]["tmp_name"],$ruta))//aca intento pasar el archivo temporal, rescrito a mi carpeta
{
    echo "El archivo $nombre se a subido con exito<br>";
}
else 
{
    echo "Hubo un error en la subida";
} 
?>
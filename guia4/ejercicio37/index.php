<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border='1'>
    <th>Nombre</th>
    <th>Imagen</th>
<?php 

/* Generar una tabla que posea fotos en un tamaño de 100x100 píxeles y 
que al pulsar se muestre la foto en su tamaño original en una página distinta 
(agregarle un link para poder volver a la página de inicio). */

$directorio = './fotos';
//http://php.net/manual/en/function.scandir.php
$archivos = scandir($directorio,1);//me va a devolver un array con los nombres de los archivos
echo var_dump($archivos);
foreach ($archivos as $item)//recorro el array de nombre de"archivos" 
{
    if ($item == '.' || $item == '..')//verifico que no sean estos archivos ocultos 
    {
        continue;//si lo son, me salto el resto de la las instrucciones dentro del foreach y reevaluo
        //http://php.net/manual/en/control-structures.continue.php
    }
    $ruta = "./fotos/".$item;//concanteo la direccion del directorio con el nombre del archivo
    
    $pagina = "./mostrar.php?ruta=".$ruta;//concanteo la direccion de la pagina con la ruta del archivo
    echo "<tr> 
        <td>{$item}</td>
        <td><a href='{$pagina}'><img src='{$ruta}' width='100px' height='100px'></a></td>
        </tr>";//primero muestro el nombre y luego la imagen
}
?>
    </table>
    
    </body>
    </html>
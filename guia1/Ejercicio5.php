<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="POST">
        <div class="container-fluid">
        <p>Escriba un numero entre 20 y 60 (inclusive)<p>
        <input type="number" min="20" max="60" name="txtNumero" id="idNumero">
        <input type="submit" value="submit">
</div>
    </form>
</body>
</html>
<?php 
/* Realizar un programa que en base al valor numérico de una variable $num, 
pueda mostrarse por pantalla, el nombre del número que tenga dentro escrito con palabras, 
para los números entre el 20 y el 60. Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.*/
//$num=44;
//verifico que el usuario haya ingresado un  numero
if (isset($_POST["txtNumero"])) 
    {
        //asigno el numero ingreaso a la variable $num
        $num=$_POST["txtNumero"];
        echo "Numero Ingresado: ".$num."<br>";
        //uso la funcion numberformatter, pasandole los parametros para idioma 
        //y el formato deseado (spellout va a mostrar el numero en letras)
        $formateador= new numberformatter("es",NUMBERFORMATTER::SPELLOUT);
        echo "Nombre del numero: ".$formateador->format($num);
    }

?>
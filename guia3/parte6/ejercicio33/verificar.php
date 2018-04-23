<?php 

if ($_POST["Contrasenia"] === $_POST["ContraseniaDos"]) 
{
    //usar header
    header("location: welcome.php");
} 
else 
{
    header("location: index.html");
}

?>

<?php 
/* Aplicación Nº 4 (Calculadora)  
Escribir un programa que use la variable 
$operador
 que pueda almacenar los símbolos 
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras 
$op1
 y 
$op2
. De acuerdo al 
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el 
resultado por pantalla. 
  */

  $operador=$_POST["selecion"];
  $op1=10;
  $op2=5;
switch ($operador) {
    case 'Suma':
    echo "suma<br>";
    echo $op1+$op2;
        break;
    case 'Resta':
        echo "resta<br>";
        echo $op1-$op2;
        break;
    case 'Multiplicacion':
        echo "Multiplicacion<br>";
        echo $op1*$op2;
        break;
    case 'Dividir':
        echo "Division<br>";
        echo $op1/$op2;
        break;
    default:
        echo "error";
        break;
}

?>
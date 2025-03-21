<?php
/*
Introducción
Un año bisiesto (en el calendario gregoriano) ocurre:

En cada año que sea divisible por 4.
A menos que el año sea divisible exactamente por 100, en cuyo caso solo es 
un año bisiesto si el año también es divisible exactamente por 400.
Algunos ejemplos:

1997 no fue un año bisiesto ya que no es divisible por 4.
1900 no fue un año bisiesto ya que no es divisible por 400.
¡El año 2000 fue un año bisiesto!


Instrucciones
Su tarea es determinar si un año determinado es bisiesto.



*/

declare(strict_types=1);

function isLeap(int $year): bool
{
    //Primera condicion : si el año es divisible por 4
    //Segunda condicion: si el año  no es divisible por 100 o es divisible por 400
    if($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)){
        return true;
    }else{
        return false;
    }
    //throw new \BadFunctionCallException("Implement the isLeap function");
}
?>
<?php

/*
Instrucciones
Su tarea es generar las primeras N filas del triángulo de Pascal.

El triángulo de Pascal es una matriz triangular de números enteros positivos.

En el triángulo de Pascal, el número de valores en una fila es igual a su número de fila 
(que empieza en uno). Por lo tanto, la primera fila tiene un valor, la segunda tiene dos, 
y así sucesivamente.

La primera fila (la superior) tiene un único valor: 1. Los valores de las filas 
subsiguientes se calculan sumando los números directamente a la derecha e izquierda 
de la posición actual en la fila anterior.

Si la fila anterior no tiene un valor a la izquierda o a la derecha de 
la posición actual (lo que solo sucede para las posiciones más a la izquierda 
o más a la derecha), trate el valor de esa posición como cero (efectivamente "ignorándolo" en la suma).

Ejemplo
Veamos las primeras 5 filas del Triángulo de Pascal:

    1
   1 1
  1 2 1
 1 3 3 1
1 4 6 4 1
La fila superior tiene un valor, que es 1.

Los valores más a la izquierda y más a la derecha solo tienen una 
posición anterior a considerar, que es la posición a su derecha, 
respectivamente, a su izquierda. Dado que el valor superior es 1, 
se deduce que todos los valores más a la izquierda y más a la derecha también son 1.

Los demás valores tienen dos posiciones a considerar. Por ejemplo, el 1 4 6 4 1valor 
central de la quinta fila ( ) es 6, al igual que los valores a su izquierda y derecha en la fila anterior son 3y 3:
*/

declare(strict_types=1);

function pascalsTriangleRows(int $rowCount)
{
    $ans=[];
   
    for($i=0;$i<$rowCount;$i++){
    $ans[]=[];
   
    for($j=0;$j<=$i;$j++){
    
    $j==0||$j==$i? 
    $ans[$i][$j]=1:
    $ans[$i][$j]=
    $ans[$i-1][$j]
    +$ans[$i-1][$j-1]; 
   
    }
   
    }
    return $ans;
    }
   
   
    //throw new \BadFunctionCallException("Implement the pascalsTriangleRows function");



?>
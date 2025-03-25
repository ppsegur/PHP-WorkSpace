<?php
/*

Instrucciones

Encuentra la diferencia entre el cuadrado de la suma y 
la suma de los cuadrados de los primeros N números naturales.

El cuadrado de la suma de los primeros diez números naturales es (1 + 2 + ... + 10)² = 55² = 3025.

La suma de los cuadrados de los primeros diez números naturales es 1² + 2² + ... + 10² = 385.

Por lo tanto, la diferencia entre el cuadrado de la suma de los primeros diez números naturales 
y la suma de los cuadrados de los primeros diez números naturales es 3025 - 385 = 2640.

No se espera que descubras una solución eficiente a partir de los principios básicos; 
se permite la investigación, de hecho, se fomenta. Encontrar el mejor algoritmo para 
el problema es una habilidad clave en la ingeniería de software.


*/

declare(strict_types=1);

function squareOfSum(int $max): int
{
   
   
    return ($max * ($max + 1) / 2) ** 2;
}
function sumOfSquares(int $max): int
{
    return $max * ($max + 1) * (2 * $max + 1) / 6;
}
function difference(int $max): int
{
    return squareOfSum($max) - sumOfSquares($max);
}

?>
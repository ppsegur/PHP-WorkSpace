<?php 

/*

Determinar si un número es perfecto, abundante o deficiente según el esquema de clasificación 
de Nicómaco (60 - 120 d. C.) para números enteros positivos.

El matemático griego Nicómaco ideó un sistema de clasificación para los números enteros positivos, 
identificando cada uno como perteneciente únicamente a las categorías de perfecto , abundante o deficiente según su suma alícuota . 
La suma alícuota se define como la suma de los factores de un número, sin incluir el número mismo. Por ejemplo, la suma alícuota de 15 es (1 + 3 + 5) = 9.

Perfecto : suma alícuota = número
6 es un número perfecto porque (1 + 2 + 3) = 6
28 es un número perfecto porque (1 + 2 + 4 + 7 + 14) = 28


Abundante : suma alícuota > número
12 es un número abundante porque (1 + 2 + 3 + 4 + 6) = 16
24 es un número abundante porque (1 + 2 + 3 + 4 + 6 + 8 + 12) = 36


Deficiente : suma alícuota < número
8 es un número deficiente porque (1 + 2 + 4) = 7
Los números primos son deficientes

Implementa un método para determinar si un número dado es perfecto . 
Dependiendo de tu nivel de inglés, es posible que también necesites implementar un método para determinar si un número dado es abundante o deficiente .


*/



declare(strict_types=1);

function getClassification(int $number): string
{
    if ($number < 1) {
        throw new \InvalidArgumentException("Number must be positive");
    }

    $sum = 0;
    for ($i = 1; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            $sum += $i;
        }
    }

    if ($sum === $number) {
        return "perfect";
    }

    if ($sum > $number) {
        return "abundant";
    }

    return "deficient";

    


    //throw new \BadFunctionCallException("Implement the getClassification function");
}
?>
<?php
/*Instrucciones
Un número de Armstrong es un número que es la suma de sus propios dígitos, cada uno elevado a la potencia del número de dígitos.

Por ejemplo:

9 es un número de Armstrong,
 porque9 = 9^1 = 9
10 no es un número de Armstrong, 
 porque10 != 1^2 + 0^2 = 1
153 es un número de Armstrong,
 porque:153 = 1^3 + 5^3 + 3^3 = 1 + 125 
 + 27 = 153
154 no es un número Armstrong,
 porque:154 != 1^3 + 5^3 + 4^3 = 1 + 125 
 + 64 = 190
Escriba algún código para determinar 
si un número es un número Armstrong.
 */

 declare(strict_types=1);

 function isArmstrongNumber(int $number): bool
 {
        $digits = str_split((string)$number);
        $exponente = count($digits);
        $sum = 0;
        foreach ($digits as $digit) {
            $sum += $digit ** $exponente;
        }
        return $sum === $number;
    //throw new \BadFunctionCallException("Implement the isArmstrongNumber function");
 }
?>
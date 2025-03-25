<?php

/*
Instrucciones
Su tarea es convertir un número en sus correspondientes sonidos de gotas de lluvia.

Si un número dado:

es divisible por 3, agregue "Pling" al resultado.
es divisible por 5, agregue "Plang" al resultado.
es divisible por 7, agregue "Plong" al resultado.
no es divisible por 3, 5 o 7, el resultado debe ser el número como una cadena.
Ejemplos
28 es divisible por 7, pero no por 3 ni por 5, por lo que el resultado sería "Plong".
30 es divisible por 3 y 5, pero no por 7, por lo que el resultado sería "PlingPlang".
34 no es divisible por 3, 5 o 7, por lo que el resultado sería "34".

*/

declare(strict_types=1);

function raindrops(int $number): string
{
    if($number % 3 == 0 && $number % 5 == 0 && $number % 7 == 0){
        return "PlingPlangPlong";
    }elseif($number % 3 == 0 && $number % 5 == 0){
        return "PlingPlang";
    }elseif($number % 3 == 0 && $number % 7 == 0){
        return "PlingPlong";
    }elseif($number % 5 == 0 && $number % 7 == 0){
        return "PlangPlong";
    }elseif($number % 3 == 0){
        return "Pling";
    }elseif($number % 5 == 0){
        return "Plang";
    }elseif($number % 7 == 0){
        return "Plong";
    }else{
        return (string)$number;
    }
   // throw new \BadFunctionCallException("Implement the raindrops function");
}


?>
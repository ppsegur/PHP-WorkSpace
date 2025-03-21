<?php 
/**Introducción
Trabajas para una empresa que crea un juego de supervivencia y 
fantasía en línea.

Al completar un nivel, un jugador recibe puntos de energía. 
La cantidad de energía otorgada depende de los objetos mágicos 
que haya encontrado al explorar ese nivel.

Instrucciones
Tu tarea es escribir el código que calcula los puntos de energía 
que se otorgan a los jugadores cuando completan un nivel.

Los puntos otorgados dependen de dos cosas:

El nivel (un número) que el jugador completó.
El valor base de cada objeto mágico recogido por el jugador durante ese nivel.
Los puntos de energía se otorgan según las siguientes reglas:

Para cada objeto mágico, toma el valor base y encuentra todos los múltiplos 
de ese valor que sean menores que el número de nivel.
Combina los conjuntos de números.
Eliminar cualquier duplicado.
Calcula la suma de todos los números que quedan.
Veamos un ejemplo:

El jugador completó el nivel 20 y encontró dos objetos mágicos 
con valores base de 3 y 5.

Para calcular los puntos de energía ganados por el jugador, 
necesitamos encontrar todos los múltiplos únicos de estos valores 
base que sean menores al nivel 20.

Múltiplos de 3 menores que 20:{3, 6, 9, 12, 15, 18}
Múltiplos de 5 menores que 20:{5, 10, 15}
Combine los conjuntos y elimine los duplicados:{3, 5, 6, 9, 10, 12, 15, 18}
Suma los múltiplos únicos:3 + 5 + 6 + 9 + 10 + 12 + 15 + 18 = 78
Por lo tanto, el jugador gana 78 puntos de energía por completar el nivel 20 y 
encontrar los dos objetos mágicos con valores base de 3 y 5. */

declare(strict_types=1);

function sumOfMultiples(int $number, array $multiples): int
{
    $sum = 0;
    // Filter out zero from the multiples array
    $multiples = array_filter($multiples, fn($multiple) => $multiple !== 0);

    for ($i = 1; $i < $number; $i++) {
        foreach ($multiples as $multiple) {
            if ($i % $multiple === 0) {
                $sum += $i;
                break;
            }
        }
    }
    if ($number == 0) {
        return 0;
    }
    return $sum;
 //   throw new \BadFunctionCallException("Implement the sumOfMultiples function");
}
?>
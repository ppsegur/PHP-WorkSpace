<?php 
/*
Calcula los puntos anotados en un solo lanzamiento de un juego de dardos.

Los dardos son un juego en el que los jugadores lanzan dardos a un objetivo .

En nuestro caso particular del juego, el objetivo recompensa con 
4 cantidades diferentes de puntos, dependiendo de dónde caiga el dardo:


Si el dardo cae fuera del objetivo, el jugador no gana puntos (0 puntos).
Si el dardo cae en el círculo exterior del objetivo, el jugador gana 1 punto.
Si el dardo cae en el círculo central del objetivo, el jugador gana 5 puntos.
Si el dardo cae en el círculo interior del objetivo, el jugador gana 10 puntos.
El círculo exterior tiene un radio de 10 unidades (esto es equivalente al radio total de todo el objetivo), 
el círculo central un radio de 5 unidades y el círculo interior un radio de 1. Por supuesto, todos están centrados en el mismo punto, es decir, los círculos son concéntricos definidos por las coordenadas (0, 0).

Dado un punto en el objetivo (definido por sus coordenadas cartesianas x y y, donde xy yson reales ),
calcule la puntuación correcta obtenida por un dardo que aterriza en ese punto.
*/


declare(strict_types=1);

function score(float $xAxis, float $yAxis): int
{
    $distance = sqrt($xAxis ** 2 + $yAxis ** 2);
    if ($distance <= 1) {
        return 10;
    }
    if ($distance <= 5) {
        return 5;
    }
    if ($distance <= 10) {
        return 1;
    }
    return 0;


   // throw new BadFunctionCallException("Please implement the __FUNCTION__ function!");
}















?>
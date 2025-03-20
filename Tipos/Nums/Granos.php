<?php
/**Calcula el número de granos de trigo en un tablero de ajedrez 
 * dado que el número en cada casilla se duplica.

Había una vez un sirviente sabio que salvó la vida de un príncipe. 
El rey prometió pagarle cualquier cantidad que se le ocurriera. Sabiendo que al rey 
le encantaba el ajedrez, el sirviente le dijo que quería granos de trigo. 
Un grano en la primera casilla del tablero de ajedrez, 
y el número de granos se duplicaba en cada casilla sucesiva.

Hay 64 casillas en un tablero de ajedrez 
(donde la casilla 1 tiene un grano, la casilla 2 
tiene dos granos, y así sucesivamente).

Escribe código que muestre:

¿Cuántos granos había en un cuadrado determinado y
el número total de granos en el tablero de ajedrez */

declare(strict_types=1);

function square(int $number): string
{
    if($number == 0 || $number > 64|| $number < 0){
        throw new \InvalidArgumentException("Invalid number");
    }
    return sprintf("%lu",(2 ** ($number - 1)));
   //  throw new \BadFunctionCallException("Implement the square function");
}

function total(): string
{
    return sprintf("%lu", (1 << 64) - 1);
}

?>
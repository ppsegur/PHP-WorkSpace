<?php
/*
Instrucciones
Consigue una puntuación en un partido de bolos.

Los bolos son un juego en el que los jugadores lanzan una bola pesada para 
derribar bolos dispuestos en triángulo. Escribe código para registrar la 
puntuación de una partida de bolos.

Puntuación de bolos
El juego consta de 10 cuadros. Un cuadro se compone de uno o dos 
lanzamientos de bola con 10 bolos en posición inicial. 
Hay tres casos para la tabulación de un cuadro.

Un cuadro abierto es aquel en el que se registra una puntuación inferior a 
10. En este caso, la puntuación del cuadro es el número de bolos derribados.

Un spare es cuando los diez bolos son derribados en el segundo lanzamiento. 
El valor total de un spare es 10 más el número de bolos derribados en el siguiente lanzamiento.

Un strike se produce cuando los diez bolos son derribados en el primer lanzamiento. 
El valor total de un strike es 10 más el número de bolos derribados en los dos 
lanzamientos siguientes. Si un strike es seguido inmediatamente por un segundo
strike, el valor del primero no se puede determinar hasta que la bola se lance una vez más.

He aquí un ejemplo de tres cuadros:

Marco 1	Fotograma 2	Fotograma 3
X (huelga)	5/ (repuesto)	9 0 (marco abierto)
El cuadro 1 es (10 + 5 + 5) = 20

El cuadro 2 es (5 + 5 + 9) = 19

El cuadro 3 es (9 + 0) = 9

Esto significa que el total actual es 48.

El décimo cuadro del juego es un caso especial. 
Si alguien lanza un spare o un strike, obtiene 
una o dos bolas de relleno, respectivamente. 
Las bolas de relleno se utilizan para calcular 
el total del décimo cuadro. Anotar un strike o 
spare con la bola de relleno no otorga al jugador 
más bolas de relleno. El valor total del décimo 
cuadro es el número total de bolos derribados.

Para un décimo cuadro de X1/ (strike y spare), el valor total es 20.

Para un décimo cuadro de XXX (tres strikes), el valor total es 30.

Requisitos
Escribe código para registrar la puntuación de una partida de bolos. Debe admitir dos operaciones:

roll(pins : int)Se llama cada vez que el jugador lanza una bola. El argumento es el número de bolos derribados.
score() : intSe llama solo al final del juego. Devuelve la puntuación total del juego.
public function roll(int $pins): void
{
    if ($pins < 0 || $pins > 10) {
        throw new RuntimeException('Pins must be between 0 and 10');
    }
    $this->rolls[] = $pins;
}
*/



//Repasar el código de la clase Game
//xq no esta muy desarrollado por mi parte

declare(strict_types=1);

class Game
{
    private array $rolls = [];

    public function roll(int $pins): void
    {
        if ($pins < 0) {
            throw new RuntimeException('Cannot be less than 0');
        }
        if ($pins > 10) {
            throw new RuntimeException('Cannot be more than 10');
        }

        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 1; $frame <= 10; $frame++) {
            if (!isset($this->rolls[$frameIndex])) {
                throw new RuntimeException('Cannot score incomplete game');
            }
            if ($this->isStrike($frameIndex)) {
                $score += 10 + $this->strikeScore($frameIndex);
                $frameIndex++;
            } else if ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareScore($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->scoreRolls($frameIndex);
                $frameIndex += 2;
            }
        }
        $this->checkTooManyFrames($frameIndex);

        return $score;
    }

    private function isStrike(int $index): bool
    {
        return $this->rolls[$index] === 10;
    }

    private function strikeScore(int $frameIndex): int
    {
        if (!isset($this->rolls[$frameIndex + 1], $this->rolls[$frameIndex + 2])) {
            throw new RuntimeException('Cannot score incomplete game');
        }

        $bonus1 = $this->rolls[$frameIndex + 1];
        $bonus2 = $this->rolls[$frameIndex + 2];

        $sum = $bonus1 + $bonus2;
        if ($sum > 10 && $frameIndex !== 10 && $bonus1 !== 10) {
            throw new RuntimeException('Those extra pins were not standing');
        }
        return $sum;
    }

    private function isSpare(int $frameIndex): bool
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
    }

    private function spareScore(int $frameIndex)
    {
        if (!isset($this->rolls[$frameIndex + 2])) {
            throw new RuntimeException('Incomplete spare check: ' . $frameIndex );
        }

        return $this->rolls[$frameIndex + 2];
    }

    private function scoreRolls(int $frameIndex)
    {
        if (!isset($this->rolls[$frameIndex + 1])) {
            throw new RuntimeException('Incomplete game');
        }

        $sum = $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
        if ($sum > 10) {
            throw new RuntimeException('Cannot hit same pin more than once');
        }
        return $sum;
    }

    private function checkTooManyFrames(int $frameIndex): void
    {
        $rolls = count($this->rolls);
        if ($this->isStrike($frameIndex-1)) {
            if ($rolls > $frameIndex + 2) {
                throw new RuntimeException('Too many frames');
            }
        } elseif ($this->isSpare($frameIndex - 2)) {
            if ($rolls > $frameIndex + 1) {
                throw new RuntimeException('Too many frames');
            }
        } elseif ($rolls > $frameIndex) {
            throw new RuntimeException('Too many frames');
        }
    }
}


?>
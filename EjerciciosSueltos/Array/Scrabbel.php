<?php
/*
Introducción
Scrabble es un juego de palabras en el que los jugadores 
colocan fichas con letras en un tablero para formar palabras. 
Cada letra tiene un valor. La puntuación de una palabra es la 
suma de los valores de sus letras.

Instrucciones
Su tarea es calcular la puntuación de Scrabble de una palabra sumando los valores de sus letras.

Las cartas se valoran de la siguiente manera:

Carta	Valor
A, E, I, O, U, L, N, R, S, T	1
Re, Sol	2
B, C, M, P	3
F, H, V, W, Y	4
K	5
J, X	8
Q, Z	10
Por ejemplo, la palabra "col" vale 5 puntos:

3 puntos para C
1 punto para O
1 punto para L
*/


declare(strict_types=1);

function score(string $word): int
{
    $array = [
        "A"  => 1,
        "E" => 1, "I" => 1, "O" => 1, "U" => 1, "L" => 1, "N" => 1, "R" => 1, "S" => 1, "T" => 1,
        "D" => 2, "G" => 2,
        "B" => 3, "C" => 3, "M" => 3, "P" => 3,
        "F" => 4, "H" => 4, "V" => 4, "W" => 4, "Y" => 4,
        "K" => 5,
        "J" => 8, "X" => 8,
        "Q" => 10, "Z" => 10
    ];
    $word = strtoupper($word);
    $score = 0;
    for ($i = 0; $i < strlen($word); $i++) {
        $score += $array[$word[$i]];
    }
    return $score;

    
    //throw new \BadFunctionCallException("Implement the score function");
}


?>
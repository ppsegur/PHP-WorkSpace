<?php
/*
Instrucciones
Determinar si una palabra o frase es un isograma.

Un isograma (también conocido como "palabra sin patrón") 
es una palabra o frase sin una letra repetida, sin embargo 
se permite que los espacios y guiones aparezcan varias veces.

Ejemplos de isogramas:

leñadores
fondo
río abajo
seis años
La palabra isogramas , sin embargo, no es un isograma, porque la s se repite.


*/

declare(strict_types=1);

function isIsogram(string $word): bool
{
    $word = strtolower($word);
    $word = str_replace(
        [' ', '.', ',', ';', ':', '!', '?', '(', ')', '-', '_', '\'', '"', '`', '~', '´', '¨', '^'],
        '',
        $word
    );
    //Realizar un for que recorra la palabra y verifique si se repite alguna letra
    for ($i = 0; $i < strlen($word); $i++) {
        for ($j = $i + 1; $j < strlen($word); $j++) {
            if ($word[$i] == $word[$j]) {
                return false;
            }
        }
    }
    return true;
    //    throw new \BadFunctionCallException("Implement the isIsogram function");
}

?>
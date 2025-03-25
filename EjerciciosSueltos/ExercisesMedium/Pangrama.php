<?php
/*

Instrucciones
Tu tarea es averiguar si una oración es un pangrama.

Un pangrama es una oración que usa todas las letras del alfabeto al 
menos una vez. No distingue entre mayúsculas y minúsculas, por 
lo que no importa si una letra es minúscula (p. ej., k) o mayúscula (p. ej. K, ).

Para este ejercicio, una oración es un pangrama si contiene cada una de las 26 letras del alfabeto inglés.
*/

declare(strict_types=1);

function isPangram(string $string): bool
{
    $string = strtolower($string);
    $string = str_replace(
        [' ', '.', ',', ';', ':', '!', '?', '(', ')', '-', '_', '\'', '"', '`', '~', '´', '¨', '^'],
        '',
        $string
    );
    


    $string = str_replace('á', 'a', $string);
    $string = str_replace('é', 'e', $string);
    $string = str_replace('í', 'i', $string);
    $string = str_replace('ó', 'o', $string);
    $string = str_replace('ú', 'u', $string);
    $string = str_replace('ü', 'u', $string);
    $string = str_replace('ñ', 'n', $string);

    //Ahora realizamos un for para recorrer el string y verificar si contiene todas las letras del abecedario
    for ($i = 97; $i <= 122; $i++) {
        if (strpos($string, chr($i)) === false) {
            return false;
        }
    }
    return true;


    //throw new \BadFunctionCallException("Implement the isPangram function");
}

?>
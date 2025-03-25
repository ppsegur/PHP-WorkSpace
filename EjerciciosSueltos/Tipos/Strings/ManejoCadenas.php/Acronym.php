<?php
/*
Instrucciones
Convertir una frase en su acrónimo.

¡A los técnicos les encantan sus TLA (acrónimos de tres letras)!

Ayude a generar algo de jerga escribiendo un programa que convierta 
un nombre largo como Portable Network Graphics en su acrónimo (PNG).

La puntuación se maneja de la siguiente manera: los guiones son separadores 
de palabras (como los espacios en blanco); todos los demás signos de 
puntuación se pueden eliminar de la entrada.

For example:

Input	Output
As Soon As Possible	ASAP
Liquid-crystal display	LCD
Thank George It's Friday!	TGIF

*/

declare(strict_types=1);

function acronym(string $text): string
{
    //lo que se deve hacer es coger el string y separarlo por espacios
    //luego coger la primera letra de cada palabra y ponerla en mayuscula
    //luego devolver el string resultante
    $text = strtoupper($text);
    $text = preg_replace('/[^a-zA-Z\s-]/', '', $text); // Remove unwanted characters except spaces and hyphens
    $text = str_replace('-', ' ', $text); // Treat hyphens as spaces
    $text = explode(" ", $text);
    $acronym = "";

    foreach ($text as $word) {
        $acronym .= $word[0];
    }
    return $acronym;

    //throw new \BadFunctionCallException("Implement the acronym function");
}

?>

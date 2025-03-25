<?php
/**
 * Al meterle "type hints" (pistas de tipo) y activar el chequeo estricto de tipos,
 * el código se pone más fácil de leer, como que se explica solo y te ahorras un montón
 * de bugs potenciales que te pueden joder luego.
 * 
 * Por defecto, las declaraciones de tipo son medio flojas (no estrictas), o sea,
 * van a intentar cambiar el tipo original para que encaje con el tipo que pusiste
 * en la declaración. 
 * 
 * En otras palabras, si le pasas un string a una función que pide un float,
 * el sistema va a tratar de convertir ese string a float como pueda.
 * 
 * Para ponerle modo estricto y que no se pase de listo, tienes que meter una línea
 * especial (un "declare") al inicio del archivo. 
 * Esto hace que el archivo entero sea estricto, no solo los parámetros de las funciones,
 * sino también lo que devuelve la función (el return).
 * 
 * Esto del modo estricto se configura archivo por archivo, no es algo global.
 * 
 * Si quieres saber más, échale un ojo al concepto de "strict type checking" en la pista
 * de PHP aquí: <link>.
 * 
 * Si no quieres el modo estricto y prefieres que sea más relajado, pues comenta
 * la línea de abajo y listo, pa' que no joda.
 */
declare(strict_types=1);

function reverseString(string $text): string
{
    //Devolver la cadena de texto al revés, existen varias formas de hacerlo esta puede ser la mas facil 
    return strrev($text);
    //throw new BadFunctionCallException("Please implement the reverseString method!");
}
?>
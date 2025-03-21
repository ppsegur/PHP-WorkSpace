<?php
/**Al agregar indicaciones de tipo y habilitar la verificación estricta de tipos,
 *  el código puede volverse más fácil de leer, autodescriptivo y 
 * reducir el número de posibles errores. Por defecto, 
 * las declaraciones de tipo no son estrictas, 
 * lo que significa que intentarán cambiar el tipo 
 * original para que coincida con el tipo especificado por la declaración de tipo.

En otras palabras, si pasas una cadena a una función que requiere un flotante, 
intentará convertir el valor de la cadena a un flotante.

Para habilitar el modo estricto, 
se debe colocar una única directiva de declaración en la parte superior del archivo. 
Esto significa que la estricticidad de los tipos se configura de manera individual por archivo. 
Esta directiva no solo afecta las declaraciones de tipo de los parámetros, 
sino también el tipo de retorno de una función.

Para más información, revisa el concepto sobre la verificación estricta de tipos en el track de PHP <link>.

Para deshabilitar la tipificación estricta, comenta la directiva a continuación. */

declare(strict_types=1);

//Task 1: Define una función para
//  devolver una lista de colores

function getAllColors(): array
{
    return array("black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white");
    //throw new \BadMethodCallException("Implement the getAllColors function");
}

//Task 2: Define una función para
//  devolver el código de color
// de un color específico
// usando la lista de colores

function colorCode(string $color): int
{
    $colors = getAllColors();
    return array_search($color, $colors);
   // throw new \BadMethodCallException("Implement the colorCode function");
}

?>
<?php
/*
Instrucciones
Tu amigo Eliud heredó una granja de su abuela Tigist. 
Su abuela era inventora y solía construir cosas demasiado 
complicadas. El gallinero tiene una pantalla digital que 
muestra un número codificado que representa la posición de 
todos los huevos que se podían recoger.

Eliud te pide que escribas un programa que muestre el número real de huevos en el gallinero.

La codificación de la información de posición se calcula de la siguiente manera:

Escanee los lugares potenciales para la puesta de huevos y marque uno 1
para un huevo existente o uno 0para un lugar vacío.
Convierte el número de binario a decimal.
Muestra el resultado en la pantalla.

Su tarea es contar la cantidad de bits 1 en la representación binaria de un número.

Restricciones
¡Olvídate de la función de conteo de bits de tu biblioteca estándar! Resuélvelo tú mismo con otras herramientas básicas.

Operadores bit a bit
En PHP existen operadores bit a bit .

Por ejemplo, el operador "bit a bit y" ( &) se puede utilizar para comprobar que un bit de un número está definido:

$number = 89; // 0b01011001
$mask16 = 16; // 0b00010000
$mask32 = 32; // 0b00100000

$isMask16 = ($number & $mask16) > 0; // 0b00010000 > 0 => TRUE
$isMask32 = ($number & $mask32) > 0; // 0b00000000 > 0 => FALSE
*/

declare(strict_types=1);

class EliudsEggs
{
    public function eggCount(int $displayValue): int
    {
        $count = 0;
        while ($displayValue > 0) {
            $count += $displayValue & 1;
            $displayValue >>= 1;
        }
        return $count;
        
        //throw new \BadMethodCallException("Implement the eggCount function");
    }
}
?>
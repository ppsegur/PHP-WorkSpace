<?php
/**
 * Instrucciones del ejercicio:
 * 
 * Determinar si un número es válido según la fórmula de Luhn.
 * 
 * - El número se proporcionará como una cadena.
 * 
 * Validar un número:
 * - Las cadenas de longitud igual o inferior a 1 no son válidas.
 * - Se permiten espacios en la entrada, pero deben eliminarse antes de la comprobación.
 * - No se permiten otros caracteres que no sean dígitos.
 * 
 * Ejemplo de número de tarjeta de crédito válido:
 * - El número a comprobar es "4539 3195 0343 6467".
 * - Comenzar al final del número y duplicar cada segundo dígito, comenzando con el segundo dígito desde la derecha y avanzando hacia la izquierda.
 * - Si el resultado de duplicar un dígito es mayor que 9, restar 9 a ese resultado.
 * - Sumar todos los dígitos. Si la suma es divisible por 10, el número original es válido.
 * 
 * Ejemplo de número no válido:
 * - El número a comprobar es "066 123 478".
 * - Seguir el mismo proceso de duplicación y suma.
 * - Si la suma no es divisible por 10, el número no es válido.
 */


declare(strict_types=1);

function isValid(string $number): bool
{
    // Elimina espacios
    $number = str_replace(' ', '', $number);
    // Debe tener al menos dos dígitos
    if (strlen($number) <= 1) {
        return false;
    }
    // Solo dígitos
    if (!preg_match('/^\d+$/', $number)) {
        return false;
    }
    $sum = 0;
    $double = false;
    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $digit = (int)$number[$i];
        if ($double) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
        $double = !$double;
    }
    return $sum % 10 === 0;
}
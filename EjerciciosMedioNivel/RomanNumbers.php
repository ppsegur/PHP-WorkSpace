<?php
/**
 * Ejercicio: Conversión de números arábigos a números romanos
 *
 * Introducción:
 * Actualmente, la mayoría de las personas utilizan números arábigos (0-9), pero hace dos mil años,
 * los europeos empleaban números romanos, representados por letras latinas con valores específicos:
 *
 *   M = 1000, D = 500, C = 100, L = 50, X = 10, V = 5, I = 1
 *
 * Un número romano es una secuencia de estas letras, sumando sus valores. Por ejemplo, XVIII = 18 (10 + 5 + 1 + 1 + 1).
 *
 * Regla especial:
 * - La misma letra no puede usarse más de tres veces seguidas.
 * - Para ciertos números (4, 9, 40, 90, 400, 900), se utiliza la notación de resta: IV, IX, XL, XC, CD, CM.
 * - El orden importa: las letras deben ir de mayor a menor valor de izquierda a derecha.
 *
 * Ejemplos:
 *   105 => CV
 *   106 => CVI
 *   104 => CIV
 *   1996 => MCMXCVI
 *
 * Instrucciones:
 * Implementa una función que convierta un número arábigo (entero) en su representación como número romano.
 * Solo se consideran los números romanos tradicionales, hasta el máximo de 3999 (MMMCMXCIX).
 *
 * Nota:
 * Existen varios métodos para realizar la conversión. Se recomienda comenzar con un enfoque sencillo
 * para comprender el concepto y luego explorar alternativas más eficientes.
 */
declare(strict_types=1);

function toRoman(int $number): string
{


    if ($number < 1 || $number > 3999) {
        throw new \InvalidArgumentException("El número debe estar entre 1 y 3999");
    }
    $map = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];
    $result = '';
    foreach ($map as $value => $roman) {
        while ($number >= $value) {
            $result .= $roman;
            $number -= $value;
        }
    }
    return $result;
}

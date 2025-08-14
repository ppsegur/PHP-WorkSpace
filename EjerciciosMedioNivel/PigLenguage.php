<?php
/**
 * Ejercicio: Traducción de texto del inglés al latín cerdo (Pig Latin).
 *
 * Tus padres te han retado a ti y a tu hermano a un partido de baloncesto dos contra dos. 
 * Confiados en ganar, te dejan anotar los primeros puntos, pero luego empiezan a dominar el partido. 
 * Necesitando un poco de ánimo, empiezas a hablar en latín cerdo, un idioma infantil inventado que resulta difícil de entender para quienes no son niños. 
 * ¡Esto te dará la ventaja para imponerte a tus padres!
 *
 * Instrucciones:
 * Traduce palabras del inglés al latín cerdo siguiendo estas reglas:
 *
 * 1. Vocales: a, e, i, o, u. Consonantes: las otras 21 letras del alfabeto inglés.
 *
 * Regla 1:
 * - Si una palabra comienza con una vocal, o comienza con "xr" o "yt", agrega "ay" al final de la palabra.
 *   Ejemplo: "apple" -> "appleay", "xray" -> "xrayay", "yttria" -> "yttriaay"
 *
 * Regla 2:
 * - Si una palabra comienza con una o más consonantes, mueve esas consonantes al final y agrega "ay".
 *   Ejemplo: "pig" -> "igpay", "chair" -> "airchay", "thrush" -> "ushthray"
 *
 * Regla 3:
 * - Si una palabra comienza con cero o más consonantes seguidas de "qu", mueve esas consonantes y "qu" al final y agrega "ay".
 *   Ejemplo: "quick" -> "ickquay", "square" -> "aresquay"
 *
 * Regla 4:
 * - Si una palabra comienza con una o más consonantes seguidas de "y", mueve las consonantes que preceden "y" al final y agrega "ay".
 *   Ejemplo: "my" -> "ymay", "rhythm" -> "ythmrhay"
 */

declare(strict_types=1);

function translate(string $text): string
{
    $words = explode(' ', $text);
    $result = [];
    foreach ($words as $word) {
        // Regla 1: comienza con vocal o xr o yt
        if (preg_match('/^(?:[aeiou]|xr|yt)/', $word)) {
            $result[] = $word . 'ay';
            continue;
        }
        // Regla 3: consonantes seguidas de qu
        if (preg_match('/^([^aeiou]*qu)(.*)/', $word, $m)) {
            $result[] = $m[2] . $m[1] . 'ay';
            continue;
        }
        // Regla 4: consonantes seguidas de y
        if (preg_match('/^([^aeiou]+)(y.*)/', $word, $m)) {
            $result[] = $m[2] . $m[1] . 'ay';
            continue;
        }
        // Regla 2: consonantes al inicio
        if (preg_match('/^([^aeiou]+)(.*)/', $word, $m)) {
            $result[] = $m[2] . $m[1] . 'ay';
            continue;
        }
        // Si no coincide con ninguna regla, dejar igual
        $result[] = $word;
    }
    return implode(' ', $result);
}

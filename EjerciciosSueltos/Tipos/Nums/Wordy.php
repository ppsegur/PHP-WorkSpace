<?php
/*
Instrucciones
Analizar y evaluar problemas matemáticos simples y devolver la respuesta como un número entero.

Iteración 0 — Números
Los problemas sin operaciones simplemente se evalúan al número dado.

¿Qué es 5?

Se evalúa como 5.

Iteración 1 — Adición
Sumar dos números juntos.

¿Cuánto es 5 más 13?

Se evalúa como 18.

Manejar números grandes y números negativos.

Iteración 2: Resta, Multiplicación y División
Ahora, realiza las otras tres operaciones.

¿Cuanto es 7 menos 5?

2

¿Cuánto es 6 multiplicado por 4?

24

¿Cuál es 25 dividido entre 5?

5

Iteración 3: Operaciones múltiples
Manejar un conjunto de operaciones, en secuencia.

Dado que se trata de problemas verbales, 
evalúe la expresión de izquierda a derecha, 
ignorando el orden típico de operaciones.

¿Cuánto es 5 más 13 más 6?

24

¿Cuánto es 3 más 2 multiplicado por 3?

15 (es decir, no 9)

Iteración 4 — Errores
El analizador debe rechazar:

Operaciones no admitidas ("¿Cuánto es 52 al cubo?")
Preguntas no matemáticas ("¿Quién es el presidente de los Estados Unidos?")
Problemas de palabras con sintaxis no válida ("¿Cuánto es 1 más más 2?")
Bono — Exponenciales
Si lo deseas, maneja exponenciales.

¿Cuál es el número 2 elevado a la quinta potencia?

32


*/

declare(strict_types=1);

function calculate(string $input): int {
    if (!str_starts_with($input, "What is ")) throw new InvalidArgumentException();
    $num = null;
    $oper = null;
    $input = substr($input, 8, -1);
    $split = explode(' ', $input);
    foreach ($split as $word) {
        if (is_numeric($word)) {
            if ($num === null) $num = (int) $word;
            else if ($oper === null) throw new InvalidArgumentException();
            else {
                switch ($oper) {
                    case "divided":
                        $num /= $word;
                        break;
                    case "multiplied":
                        $num *= $word;
                        break;
                    case "plus":
                        $num += $word;
                        break;
                    case "minus":
                        $num -= $word;
                        break;
                }
                $oper = null;
            }
        }
        else if ($word === 'by') continue;
        else {
            if (!in_array($word, ['divided', 'multiplied', 'plus', 'minus'])) throw new InvalidArgumentException();
            $oper = $word;
        }
    }
    return $num;
}
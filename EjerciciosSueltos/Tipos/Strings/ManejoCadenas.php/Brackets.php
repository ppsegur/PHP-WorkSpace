<?php

/*
Instrucciones
Dada una cadena que contiene corchetes [],
llaves {}, paréntesis ()
o cualquier combinación de estos, verifique 
que todos los pares coincidan y estén correctamente 
anidados. Se deben ignorar los demás caracteres. 
Por ejemplo, "{what is (42)}?"es equilibrado y "[text}"no lo es.


*/


declare(strict_types=1);

function brackets_match(string $input): bool
{
    $brackets = ['{' => '}', '[' => ']', '(' => ')'];
    $stack = [];
    for ($i = 0; $i < strlen($input); $i++) {
        if (in_array($input[$i], array_keys($brackets))) {
            array_push($stack, $input[$i]);
        } elseif (in_array($input[$i], array_values($brackets))) {
            if (empty($stack) || $brackets[array_pop($stack)] != $input[$i]) {
                return false;
            }
        }
    }
    return empty($stack);
    
   // throw new \BadFunctionCallException("Implement the brackets_match function");
}

?>
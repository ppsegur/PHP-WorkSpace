<?php
/*
Instrucciones
Crea una función maskifypara enmascarar los dígitos de un número de tarjeta de crédito con #.

Requisitos:

No enmascare el primer dígito ni los últimos cuatro dígitos
No enmascarar caracteres que no sean dígitos
No enmascarar si la entrada es menor a 6
Devolver '' cuando la entrada esté vacía
Ejemplos:

1234-5678-9012se convierte a1###-####-9012
123456789012se convierte a1#######9012
*/
declare(strict_types=1);

function maskify(string $cc): string
{
    if (strlen($cc)==0){
        return '';

    }elseif(strlen($cc) < 6){
        return $cc;
    }else{
        $lastfour = substr($cc, -4);
        $first = substr($cc, 0, 1);
        $cc = substr($cc, 1, -4);
        $cc = preg_replace('/\d/', '#', $cc);
        return $first . $cc . $lastfour;

    }

      //  throw new \BadFunctionCallException("Implement the maskify function");

}

?>
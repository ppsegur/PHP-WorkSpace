<?php

class Form
{

    //task 2: Declara los tipos para rellenar 
    // el formulario en blanco 
    function blanks(int $length): string
    {
        return str_repeat(" ", $length);
    }

//task 3: Declarar el tipo al dividir un valor
//  en letras separadas 
    function letters(string $word): array
    {
        return mb_str_split($word);
    }

    //Task 4: Declarar el tipo para verificar si un 
    //valor encaja en un formulario
    function checkLength(string $word,int $max_length): bool
    {
        $difference = mb_strlen($word) - $max_length;
        return $difference <= 0;
    }

    //Task  5: Declarar el tipo para formatear una dirección
    //En el formato correcto
    function formatAddress(Address $address): string 
    {
        $formatted_street = mb_strtoupper($address->street);
        $formatted_postal_code = mb_strtoupper($address->postal_code);
        $formatted_city = mb_strtoupper($address->city);

        return <<<FORMATTED_ADDRESS
            $formatted_street
            $formatted_postal_code $formatted_city
            FORMATTED_ADDRESS;
    }
}

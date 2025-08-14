<?php
/*
    Instrucciones del ejercicio:

    Implemente un cifrado de desplazamiento simple como César y un cifrado de sustitución más seguro.

    Paso 1:
        - El cifrado César consiste en alterar el orden de las letras del alfabeto desplazándolas un número fijo de posiciones.
        - Por ejemplo, si desplazamos 3 posiciones: la letra 'a' se convierte en 'd', 'b' en 'e', etc.
        - Ejemplo: codificar "iamapandabear" devuelve "ldpdsdqgdehdu".
        - Decodificar "ldpdsdqgdehdu" devuelve "iamapandabear".

    Paso 2:
        - Modifica el código para que se pueda especificar una clave y usarla como distancia de desplazamiento (cifrado por sustitución).
        - Ejemplo: clave "aaaaaaaaaaaaaaaaaaa" codifica "iamapandabear" y devuelve el original.
        - Ejemplo: clave "dddddddddddddddd" codifica "iamapandabear" y devuelve "ldpdsdqgdehdu".

    Paso 3:
        - Si no se envía ninguna clave, genera una clave aleatoria de al menos 100 caracteres alfanuméricos en minúsculas.
        - La clave debe contener solo minúsculas.

    Tu tarea es implementar estas funciones de cifrado y descifrado siguiendo los pasos anteriores.
*/declare(strict_types=1);

class SimpleCipher
{
    public $key;



    public function __construct(string $key = null)
    {
        if ($key === null) {
            // Genera una clave aleatoria de 100 letras minúsculas
            $key = '';
            for ($i = 0; $i < 100; $i++) {
                $key .= chr(rand(97, 122)); // 'a' a 'z'
            }
        }
        if (!preg_match('/^[a-z]+$/', $key)) {
            throw new \InvalidArgumentException('La clave debe contener solo letras minúsculas');
        }
        $this->key = $key;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function encode(string $plainText): string
    {
        $cipherText = '';
        $keyLength = strlen($this->key);
        for ($i = 0; $i < strlen($plainText); $i++) {
            $p = ord($plainText[$i]) - ord('a');
            $k = ord($this->key[$i % $keyLength]) - ord('a');
            $c = ($p + $k) % 26;
            $cipherText .= chr($c + ord('a'));
        }
        return $cipherText;
    }

    public function decode(string $cipherText): string
    {
        $plainText = '';
        $keyLength = strlen($this->key);
        for ($i = 0; $i < strlen($cipherText); $i++) {
            $c = ord($cipherText[$i]) - ord('a');
            $k = ord($this->key[$i % $keyLength]) - ord('a');
            $p = ($c - $k + 26) % 26;
            $plainText .= chr($p + ord('a'));
        }
        return $plainText;
    }
}
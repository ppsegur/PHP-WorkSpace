
<?php
/*
Estás creando un club secreto de programación con amigos y amigos de amigos. Como no todos se conocen, tú y tus amigos han decidido crear un protocolo secreto para reconocer a alguien como miembro. No quieres que nadie que no sepa descifre el código.

Has diseñado el código para que una persona diga un número entre 1 y 31
 y la otra persona lo convierta en una serie de acciones.

Instrucciones
Su tarea es convertir un número entre 1 y 31 
en una secuencia de acciones en el protocolo de enlace secreto.

La secuencia de acciones se elige observando los cinco dígitos
 más a la derecha del número una vez convertido a binario. 
Comienza por el dígito más a la derecha y avanza hacia la izquierda.

Las acciones para cada lugar del número son:

00001 = wink
00010 = double blink
00100 = close your eyes
01000 = jump
10000 = Reverse the order of the operations in the secret handshake.
Utilicemos el número 9como ejemplo:

9 en binario es 1001.
El dígito que está más a la derecha es 1, por lo que la primera acción es wink.
Yendo hacia la izquierda, el siguiente dígito es 0, por lo que no hay doble parpadeo.
Yendo nuevamente a la izquierda, el siguiente dígito es 0, por lo que dejas los ojos abiertos.
Yendo nuevamente hacia la izquierda, el siguiente dígito es 1, así que saltas.
Ese fue el último dígito, por lo que el código final es:

wink, jump
Dado el número 26, que está 11010en binario, obtenemos las siguientes acciones:

doble parpadeo
saltar
acciones inversas
El apretón de manos secreto para el 26 es por tanto:

jump, double blink

*/

/*Pruebas
Task 1:  */

declare(strict_types=1);

class SecretHandshake
{
    public function commands(int $handshake): array
    {
        // definimos las acciones en un array asociativo
        $actions = [
            1 => "wink",
            2 => "double blink",
            4 => "close your eyes",
            8 => "jump",
        ];

        $reverse = 16; // Si este bit está activado, invertimos el orden

        $result = [];
        foreach ($actions as $bit => $action) {
            if ($handshake & $bit) { // Verifica si el bit está presente
                $result[] = $action;
            }
        }

        if ($handshake & $reverse) {
            $result = array_reverse($result);
        }

        return $result;
    }
}

// Pruebas
$handshake = new SecretHandshake();

echo implode(", ", $handshake->commands(9)) . "\n"; // wink, jump
echo implode(", ", $handshake->commands(26)) . "\n"; // jump, double blink
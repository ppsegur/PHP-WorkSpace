<?php
/* Instrucciones
Por falta de un clavo de herradura se perdió un reino, o eso dice el dicho.

Dada una lista de entradas, genere el proverbio relevante. Por ejemplo, dada la lista 
["nail", "shoe", "horse", "rider", "message", "battle", "kingdom"], generará el texto completo de 
esta rima proverbial:

For want of a nail the shoe was lost.
For want of a shoe the horse was lost.
For want of a horse the rider was lost.
For want of a rider the message was lost.
For want of a message the battle was lost.
For want of a battle the kingdom was lost.
And all for the want of a nail.
Tenga en cuenta que la lista de entradas puede variar; su solución debe ser capaz de gestionar 
listas de longitud y contenido arbitrarios. Ninguna línea del texto de salida debe ser una cadena estática e 
inmutable; todas deben variar según la entrada proporcionada.*/

declare(strict_types=1);

class Proverb
{

    public function recite($array): array
    {
       if(empty($array)){
           return [];
         }
         for($i= 0; $i < count($array)-1; $i++){
             $result[] = "For want of a {$array[$i]} the {$array[$i+1]} was lost.";
         }
            $result[] = "And all for the want of a {$array[0]}.";
            return $result;
    }
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

?>
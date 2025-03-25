<?php
/*
Instrucciones
Implementa la operación keep`and` discarden colecciones. 
Dada una colección y un predicado sobre sus elementos, ` 
keepdevuelve una nueva colección que contiene los elementos 
donde el predicado es verdadero, `while` discard devuelve una 
nueva colección que contiene los elementos donde el predicado es falso.

Por ejemplo, dada la colección de números:

1, 2, 3, 4, 5
Y el predicado:

¿Es el numero par?
Entonces su operación de mantenimiento debería producir:

2, 4
Mientras que su operación de descarte debería producir:

1, 3, 5
Tenga en cuenta que la unión de mantener y descartar son todos los elementos.

Las funciones pueden llamarse keepy discard, o pueden necesitar nombres diferentes 
para no entrar en conflicto con funciones o conceptos existentes en su lenguaje.

Restricciones
¡No uses la función de filtro/rechazo/como se llame que ofrece tu biblioteca estándar! Resuelve este problema tú mismo con otras herramientas básicas.

*/

declare(strict_types=1);

class Strain

{
    public function keep(array $list, callable $predicate): array
    {   
        $result = [];
        foreach($list as $item){
            if($predicate($item)){
                $result[] = $item;
            }
        }
        return $result;
    }

    public function discard(array $list, callable $predicate): array
    {
        $result = [];
        foreach($list as $item){
            if(!$predicate($item)){
                $result[] = $item;
            }
        }
        return $result;
    }
}

?>
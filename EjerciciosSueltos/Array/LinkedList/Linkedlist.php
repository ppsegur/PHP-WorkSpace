<?php
/*
Su equipo ha decidido usar una lista doblemente enlazada para representar cada ruta de 
tren en el horario. Cada estación a lo largo de la ruta del tren estará representada 
por un nodo en la lista enlazada.

No tienes que preocuparte por los horarios de llegada y salida de las estaciones. 
Cada estación estará representada simplemente por un número.

Las rutas se pueden extender añadiendo estaciones al principio o al final. 
También se pueden acortar eliminando estaciones al principio o al final.

A veces una estación se cierra y en ese caso es necesario eliminarla de la ruta, 
incluso si no está al principio o al final de la ruta.

El tamaño de una ruta no se mide por la distancia que recorre el tren, 
sino por cuántas estaciones se detiene.

Nota
La lista enlazada es una estructura de datos fundamental en informática, 
que se utiliza a menudo en la implementación de otras estructuras de datos. 
Como su nombre indica, es una lista de nodos enlazados entre sí. 
Es una lista de "nodos", donde cada nodo enlaza con su vecino o vecinos. 
En una lista enlazada simple, cada nodo enlaza únicamente con el nodo siguiente. 
En una lista enlazada doble, cada nodo enlaza tanto con el nodo anterior como con el posterior.

Si quieres profundizar en las listas enlazadas, consulta este artículo que las explica con bonitos dibujos.

*/


declare(strict_types=1);

class LinkedList
{
    private array $linklist = [];

   
    // Se agrega un valor al final de la lista
    public function push(int $value): void
    {
        $this->linklist[] = $value;
    }
    // Se elimina y devuelve  el último valor de la lista
    public function pop(): int
    {
        return array_pop($this->linklist);
    }
    // Se elimina y devuelve el primer valor de la lista
    public function shift(): int
    {
        return array_shift($this->linklist);
    }
    // Se agrega un valor al principio de la lista
    public function unshift(int $value): void
    {
        array_unshift($this->linklist, $value);
    }
    // Se devuelve la cantidad de valores en la lista
    public function count(): int
    {
        return count($this->linklist);
    }
    // Se elimina el valor de la lista en la posición indicada
    public function delete(int $value): void
    {
        $key = array_search($value, $this->linklist);
        if ($key !== false) {
            unset($this->linklist[$key]);
        }
    }
}

?>
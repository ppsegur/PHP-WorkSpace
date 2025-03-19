<?php

//Task 1: Define una función para devolver una lista vacía
function empty_language_list(){
    return $array = array();
}
//Task 2: Modificar la función para
// crear una lista de cualquier número de idiomas
//debe aceptar un argumento esta función

function language_list(...$idioma): array{
    $array = array();
    foreach($idioma as $i){
        $array[] = $i;
    }
    return $array;      
}

//Task 3: Define una función para agregar un idioma 
//a la lista 
function add_to_language_list($array, $nuevoIdioma): array {
    $array[] = $nuevoIdioma;
    return $array;
}
//Task 4 : Define una función para eliminar
//un elemeto de la lista de idiomas 
function prune_language_list($array): array {
    array_shift($array);
    return $array;
}
//Task 5 : define una funcion para devolver
//el primer elemento de la lista
function current_language($array) {
    return reset($array);
}

//Task 6: Define una función para devolver cuántos
//idiomas hay en la lista 
function language_list_length($array): int{
    return count($array);

}

?>
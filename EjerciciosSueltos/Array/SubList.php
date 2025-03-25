<?php
/*
Instrucciones
Dadas dos listas Ay B, determine si:

Lista Aes igual a lista B; o
La lista Acontiene una lista B( Aes una superlista de B); o
La lista Aestá contenida en la lista B( Aes una sublista de B); o
Ninguna de las anteriores es verdadera, por lo tanto las listas Ay Bson desiguales.
Específicamente, lista Aes igual a lista Bsi ambas listas tienen los mismos valores en el mismo orden. Lista Aes una superlista de Bsi Acontiene una subsecuencia contigua de valores iguales a B. Lista Aes una sublista de Bsi Bcontiene una subsecuencia contigua de valores iguales a A.

Ejemplos:

Si A = []y B = [](ambas listas están vacías), entonces Ay Bson iguales
Si A = [1, 2, 3]y B = [], entonces Aes una superlista deB
Si A = []y B = [1, 2, 3], entonces Aes una sublista deB
Si A = [1, 2, 3]y B = [1, 2, 3, 4, 5], entonces Aes una sublista deB
Si A = [3, 4, 5]y B = [1, 2, 3, 4, 5], entonces Aes una sublista deB
Si A = [3, 4]y B = [1, 2, 3, 4, 5], entonces Aes una sublista deB
Si A = [1, 2, 3]y B = [1, 2, 3], entonces Ay Bson iguales
Si A = [1, 2, 3, 4, 5]y B = [2, 3, 4], entonces Aes una superlista deB
Si A = [1, 2, 4]y B = [1, 2, 3, 4, 5], entonces Ay Bson desiguales
Si A = [1, 2, 3]y B = [1, 3, 2], entonces Ay Bson desiguales
*/


declare(strict_types=1);

class Sublist
{
    public function compare(array $listOne, array $listTwo): string
    {
        if($listOne === $listTwo){
            return "EQUAL";
        }elseif($this->isSuperList($listOne, $listTwo)){
            return "SUPERLIST";
        }elseif($this->isSubList($listOne, $listTwo)){
            return "SUBLIST";
        }else{
            return "UNEQUAL";
        }

        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }
    private function isSuperList(array $listOne, array $listTwo): bool
    {
        $lenListOne = count($listOne);
        $lenListTwo = count($listTwo);
        if($lenListOne < $lenListTwo){
            return false;
        }
        for($i = 0; $i <= $lenListOne - $lenListTwo; $i++){
            if(array_slice($listOne, $i, $lenListTwo) === $listTwo){
                return true;
            }
        }
        return false;
    }
    private function isSubList(array $listOne, array $listTwo): bool
    {
        $lenListOne = count($listOne);
        $lenListTwo = count($listTwo);
        if($lenListOne > $lenListTwo){
            return false;
        }
        for($i = 0; $i <= $lenListTwo - $lenListOne; $i++){
            if(array_slice($listTwo, $i, $lenListOne) === $listOne){
                return true;
            }
        }
        return false;
    }
    
}


?>
<?php
/*Introducción
Tu cuerpo está compuesto de células 
que contienen ADN. Estas células se
desgastan con regularidad y
necesitan ser reemplazadas,
lo cual logran dividiéndose en 
células hijas. De hecho,
¡el cuerpo humano promedio 
experimenta alrededor de 10
cuatrillones de divisiones
celulares a lo largo de la vida!

Cuando las células se dividen, 
su ADN también se replica. 
A veces, durante este proceso, 
se producen errores y fragmentos 
de ADN se codifican con información 
incorrecta. Si comparamos dos 
cadenas de ADN y contamos las 
diferencias entre ellas, 
podemos ver cuántos errores 
se produjeron. Esto se conoce ç
como la "distancia de Hamming".

La distancia de Hamming 
es útil en muchas áreas de
la ciencia, no solo de la 
biología, por lo que es una 
frase agradable de conocer :)

Instrucciones
Calcular la distancia de 
Hamming entre dos cadenas de ADN.

Leemos el ADN usando las letras 
C, A, G y T. Dos hebras podrían 
verse así:

GAGCCTACTAACGGGAT
CATCGTAATGACGGCCT
^ ^ ^  ^ ^    ^^
Tienen 7 diferencias y por lo tanto 
la distancia de Hamming es 7.

Notas de implementación
La distancia de Hamming sólo se define para secuencias de igual longitud, por lo que un intento de calcularla entre secuencias de diferentes longitudes no debería funcionar.
 */
declare(strict_types=1);

function distance(string $strandA, string $strandB): int
{

    if (strlen($strandA) !== strlen($strandB)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    } 
    $distance = 0;
    //Se realiza un for que compara cada posición 
    //de las cadenas de ADN, si 
    //son diferentes se incrementa 
    // la distancia qué será el resultado
    //de la función
    for ($i = 0; $i < strlen($strandA); $i++) {
        if ($strandA[$i] != $strandB[$i]) {
            $distance++;
        }
    }

    return $distance;
    
   // throw new \BadFunctionCallException("Implement the distance function");
}

?>
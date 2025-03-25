<?php
/* Instrucciones
Si quieres construir algo con una 
Raspberry Pi, probablemente usarás 
resistencias . Para este ejercicio, necesitas saber dos cosas sobre ellas:

Cada resistencia tiene un valor de resistencia.
Las resistencias son pequeñas, tan pequeñas 
que si imprimieras el valor de la 
resistencia en ellas, sería difícil leerlo.
Para solucionar este problema, 
los fabricantes imprimen bandas 
de colores en las resistencias 
para indicar sus valores de 
resistencia. Cada banda tiene 
una posición y un valor numérico.

Las dos primeras bandas de una resistencia 
tienen un esquema de codificación simple: 
cada color corresponde a un solo número. 
Por ejemplo, si se imprime una banda marrón 
(valor 1) seguida de una banda verde (valor 5), 
se traduciría al número 15.

En este ejercicio, crearás un programa 
útil para que no tengas que recordar 
los valores de las bandas. El programa 
tomará los nombres de los colores como 
entrada y generará un número de dos dígitos, 
incluso si la entrada contiene más de dos 
colores.

Los colores de las bandas están codificados 
de la siguiente manera:

negro: 0
marrón: 1
rojo: 2
naranja: 3
amarillo: 4
verde: 5
azul: 6
violeta: 7
gris: 8
blanco: 9
Del ejemplo anterior: marrón-verde 
debería devolver 15, y 
marrón-verde-violeta también 
debería devolver 15, ignorando el 
tercer color. */

declare(strict_types=1);

class ResistorColorDuo
{

    public function getColorsValue(array $colors): int
    {
        $colors1 = [
            "black", 
            "brown",
            "red",
            "orange",
            "yellow",
            "green",
            "blue",
            "violet",
            "grey", 
            "white",
        ];
        /**Qué hace: 
         * Calcula el valor de la resistencia 
         * basado en los dos primeros colores 
         * del array $colors y lo devuelve. 
         * Aquí está el desglose:
        array_search($colors[0], $colors1): 
        Busca el índice del primer color 
        ($colors[0]) en el array $colors1. 
        Este índice corresponde al valor 
        del color según el código de colores.
        * 10: Multiplica el valor del primer 
        color por 10, ya que en el código de 
        colores de resistencias, el primer 
        color representa la decena.
        array_search($colors[1], $colors1): 
        Busca el índice del segundo color 
        ($colors[1]) en el array $colors1. 
        Este índice corresponde al valor de 
        la unidad.
        +: Suma el valor del segundo 
        color al resultado del primer 
        color multiplicado por 10.
        return: Devuelve el valor 
        calculado como un entero.
        Por ejemplo:

        Si $colors = ["brown", "black"], 
        entonces:
        array_search("brown", $colors1) 
        devuelve 1.
        array_search("black", $colors1) 
        devuelve 0.
        El cálculo es 1 * 10 + 0 = 10.
        El método devuelve 10.
         *
         */
        return array_search($colors[0],$colors1)*10+array_search($colors[1],$colors1);
    }     
}
?>
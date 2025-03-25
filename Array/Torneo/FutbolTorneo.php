
<?php

/*
Cuente los resultados de una pequeña competición de fútbol.

A partir de un archivo de entrada que contiene qué equipo jugó contra quién 
y cuál fue el resultado, cree un archivo con una tabla como esta:

Team                           | MP |  W |  D |  L |  P
Devastating Donkeys            |  3 |  2 |  1 |  0 |  7
Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6
Blithering Badgers             |  3 |  1 |  0 |  2 |  3
Courageous Californians        |  3 |  0 |  1 |  2 |  1
¿Qué significan esas abreviaturas?

MP: Partidos jugados
W: Partidos ganados
D: Partidos Empatados
L: Partidos perdidos
P: Puntos
Una victoria otorga 3 puntos. Un empate otorga 1. Una derrota otorga 0.

El resultado debe ordenarse por puntos, en orden descendente. En caso de empate, 
los equipos se ordenan alfabéticamente.

Aporte
Su programa de conteo recibirá una entrada que se verá así:

Allegoric Alaskans;Blithering Badgers;win
Devastating Donkeys;Courageous Californians;draw
Devastating Donkeys;Allegoric Alaskans;win
Courageous Californians;Blithering Badgers;loss
Blithering Badgers;Devastating Donkeys;loss
Allegoric Alaskans;Courageous Californians;win
El resultado del partido se refiere al primer equipo de la lista. Por lo tanto, esta línea:

Allegoric Alaskans;Blithering Badgers;win
significa que los Allegoric Alaskans vencieron a los Blithering Badgers.

Esta linea:

Courageous Californians;Blithering Badgers;loss
significa que los Blithering Badgers vencieron a los valientes californianos.

Y esta linea:

Devastating Donkeys;Courageous Californians;draw
significa que los Burros Devastadores y los Valientes Californianos empataron.

*/

declare(strict_types=1);

class Tournament
{
    public function __construct()
    {
        throw new BadFunctionCallException("Please implement the Tournament class!");
    }
}



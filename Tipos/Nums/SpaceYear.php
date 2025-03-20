<?php
/*Corre el año 2525 y acabas de emprender un viaje para visitar todos los planetas del Sistema Solar 
(Mercurio, Venus, la Tierra, Marte, Júpiter, Saturno, Urano y Neptuno). La primera parada es Mercurio, 
donde la aduana te exige rellenar un formulario (al parecer, la burocracia no es específica de la Tierra). 
Al entregarle el formulario al agente de aduanas, este lo examina con atención y frunce el ceño. 
"¿ De verdad esperas que crea que solo tienes 50 años? ¡Debes de tener cerca de 200!".

Divertido, esperas a que el aduanero se ría, pero parece que va muy en serio. 
Te das cuenta de que has ingresado tu edad en años terrestres , 
¡pero el aduanero la esperaba en años mercurianos ! Como el período orbital de 
Mercurio alrededor del Sol es significativamente más corto que el de la Tierra, 
eres mucho mayor en años mercurianos. Tras unos cálculos rápidos, logras ingresar 
tu edad en años mercurianos. El aduanero sonríe, satisfecho, y te deja pasar. 
Recuerda calcular tu edad planetaria antes de futuros controles aduaneros para evitar confusiones. */

/*
Dada una edad en segundos, calcule qué edad tendría alguien en un 
planeta de nuestro Sistema Solar.

Un año terrestre equivale a 365,25 días terrestres, o 31.557.600 segundos. 
Si te dijeran que alguien tiene 1.000.000.000 de segundos, su edad sería de 31,69 años terrestres.

Para los demás planetas, hay que tener en cuenta su período orbital en años terrestres:

Planeta	Período orbital en años terrestres
Mercurio	0.2408467
Venus	0.61519726
Tierra	1.0
Marte	1.8808158
Júpiter	11.862615
Saturno	29.447498
Urano	84.016846
Neptuno	164.79132
*/

declare(strict_types=1);

class SpaceAge
{
 
 
    private int $seconds;
    private float $secondsInEarthYear = 31557600;
    private float $mercuryYear = 0.2408467;
    private float $venusYear = 0.61519726;
    private float $marsYear = 1.8808158;
    private float $jupiterYear = 11.862615;
    private float $saturnYear = 29.447498;
    private float $uranusYear = 84.016846;
    private float $neptuneYear = 164.79132;

    public function __construct(int $seconds)
    {
        //365,25 dias 

        $this->seconds = $seconds;



        // throw new \BadMethodCallException("Implement the __construct method");
    }

    public function earth(): float
    {
        return $this->seconds / $this->secondsInEarthYear;
       // throw new \BadMethodCallException("Implement the earth method");
    }

    public function mercury(): float
    {
        return $this->earth() / $this->mercuryYear;
        //throw new \BadMethodCallException("Implement the mercury method");
    }

    public function venus(): float
    {
        return $this->earth() / $this->venusYear;

       // throw new \BadMethodCallException("Implement the venus method");
    }

    public function mars(): float
    {
        return $this->earth() / $this->marsYear;
        //throw new \BadMethodCallException("Implement the mars method");
    }

    public function jupiter(): float
    {
        return $this->earth() / $this->jupiterYear;
       // throw new \BadMethodCallException("Implement the jupiter method");
    }

    public function saturn(): float
    {
        return $this->earth() / $this->saturnYear;
        //throw new \BadMethodCallException("Implement the saturn method");
    }

    public function uranus(): float
    {
        return $this->earth() / $this->uranusYear;
        //throw new \BadMethodCallException("Implement the uranus method");
    }

    public function neptune(): float
    {   
        return $this->earth() / $this->neptuneYear;
        //throw new \BadMethodCallException("Implement the neptune method");
    }
}

?>
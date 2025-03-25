<?php
/*
Instrucciones
En una partida de Dungeons & Dragons , cada jugador comienza generando un 
personaje con el que puede jugar. Este personaje tiene, entre otras, 
seis habilidades: fuerza, destreza, constitución, inteligencia, sabiduría y 
carisma. Estas seis habilidades tienen puntuaciones que se determinan 
aleatoriamente. Para ello, se lanzan cuatro dados de seis caras y se 
anota la suma de los tres dados más grandes. Se repite esto seis veces, una por cada habilidad.

Los puntos de vida iniciales de tu personaje son 10 + su modificador de constitución. 
Para obtener este modificador, resta 10 a su constitución, divide el resultado entre 2 y redondea hacia abajo.

Escriba un generador de caracteres aleatorios que siga las reglas anteriores.

Por ejemplo, los seis lanzamientos de cuatro dados podrían verse así:

5, 3, 1, 6: Descartas el 1 y sumas 5 + 3 + 6 = 14, que asignas a la fuerza.
3, 2, 5, 3: Descartas el 2 y sumas 3 + 5 + 3 = 11, que asignas a la destreza.
1, 1, 1, 1: Descartas el 1 y sumas 1 + 1 + 1 = 3, que asignas a constitución.
2, 1, 6, 6: Descartas el 1 y sumas 2 + 6 + 6 = 14, que asignas a la inteligencia.
3, 5, 3, 4: Descartas el 3 y sumas 5 + 3 + 4 = 12, que asignas a la sabiduría.
6, 6, 6, 6: Descartas el 6 y sumas 6 + 6 + 6 = 18, que asignas al carisma.
class DndCharacter
{
    private array $abilities;
    private int $constitutionModifier;
    private int $hitPoints;

    public function __construct()
    {
        $this->abilities = $this->generateAbilities();
        $this->constitutionModifier = $this->calculateModifier($this->abilities['constitution']);
        $this->hitPoints = 10 + $this->constitutionModifier;
    }

    private function rollDice(): int
    {
        $rolls = [];
        for ($i = 0; $i < 4; $i++) {
            $rolls[] = random_int(1, 6);
        }
        sort($rolls);
        return array_sum(array_slice($rolls, 1));
    }

    private function generateAbilities(): array
    {
        return [
            'strength' => $this->rollDice(),
            'dexterity' => $this->rollDice(),
            'constitution' => $this->rollDice(),
            'intelligence' => $this->rollDice(),
            'wisdom' => $this->rollDice(),
            'charisma' => $this->rollDice(),
        ];
    }

    private function calculateModifier(int $score): int
    {
        return intdiv($score - 10, 2);
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }
}
Como la constitución es 3, el modificador de constitución es -4 y los puntos de vida son 6.
*/
declare(strict_types=1);

class DndCharacter
{
    //En proceso de solución, mucha tela.
    private array $abilities;
    private int $constitutionModifier;
    private int $hitPoints;

    public function __construct()
    {
        
        $this->abilities = $this->generateAbilities();
        $this->constitutionModifier = $this->calculateModifier($this->abilities['constitution']);
        $this->hitPoints = 10 + $this->constitutionModifier;
         

       // throw new BadFunctionCallException("Please implement the DndCharacter class!");
    }

    // Add methods as expected by the tests
    public function rollDice(): int
    {
        $rolls = [];
        for ($i = 0; $i < 4; $i++) {
            $rolls[] = random_int(1, 6);
        }
        sort($rolls);
        return array_sum(array_slice($rolls, 1));
    }
    public function generateAbilities(): array
    {
        return [
            'strength' => $this->rollDice(),
            'dexterity' => $this->rollDice(),
            'constitution' => $this->rollDice(),
            'intelligence' => $this->rollDice(),
            'wisdom' => $this->rollDice(),
            'charisma' => $this->rollDice(),
        ];
    }
    public	function calculateModifier(int $score): int
    {
        return intdiv($score - 10, 2);
    }

}





?>
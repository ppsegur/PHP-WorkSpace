<?php
/*
Instrucciones

Escribe un simulador de robot.

Las instalaciones de pruebas de una fábrica de robots necesitan 
un programa para verificar los movimientos del robot.

Los robots tienen tres movimientos posibles:

Gire a la derecha
Gire a la izquierda
avance
Los robots se colocan en una cuadrícula infinita hipotética, 
mirando en una dirección particular (norte, este, sur u oeste) en un conjunto de coordenadas {x,y}, 
por ejemplo, {3,8}, con coordenadas que aumentan hacia el norte y el este.

A continuación, el robot recibe una serie de instrucciones, 
momento en el cual el centro de pruebas verifica la nueva posición del robot y en qué dirección apunta.

La cadena de letras "RAALAL" significa:
Gire a la derecha
Avanzar dos veces
Gire a la izquierda
Avanzar una vez
Gire a la izquierda otra vez
Digamos que un robot empieza en {7, 3}, mirando al norte. Al ejecutar este flujo de instrucciones, 
debería dejarlo en {9, 4}, mirando al oeste.


declare(strict_types=1);

class RobotSimulator
{
    private array $position;
    /** @param int[] $position 
    public function __construct(array $position, string $direction)
    {
        $this->position = [0,0]; //Asignamos una posición inicial para el array
        $this->direction = $direction;

        throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    public function instructions(string $instructions): void
    {
        $this->instructions = $instructions;

        $instruccionesSeparadas = str_split($instructions);
        foreach ($instruccionesSeparadas as $instruccion) {
            switch ($instruccion) {
                case 'R':
                    $this->position[1]++;
                break;
                case 'L':
                    $this->position[1]--;
                    break;
                case 'A':
                    $this->position[0]++;
                    break;
            }
        }
        throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    /** @return int[] 
    public function getPosition(): array
    {
         $this->position[0];
         if($this->position[0] == 0){
             return 
         }
        throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    public function getDirection(): string
    {
        return $this->position[1];
        throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }
}
*/
?>
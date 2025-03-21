<?php


/* Administrar la configuración de fábrica del robot.

Cuando un robot sale de la fábrica, no tiene nombre.

La primera vez que se enciende un robot, se genera 
un nombre aleatorio en formato de dos letras mayúsculas seguidas de 
tres dígitos, como RX837 o BC811.

De vez en cuando necesitamos restablecer un robot a su configuración de 
fábrica, lo que significa que su nombre se borra. La próxima vez que lo solicites, 
el robot responderá con un nombre aleatorio.

Los nombres deben ser aleatorios: no deben seguir una secuencia predecible. 
Usar nombres aleatorios implica riesgo de colisiones. Su solución debe garantizar 
que cada robot existente tenga un nombre único. */

declare(strict_types=1);

class Robot
{
    private static array $nombres = [];
    private ?string $nombre = null;

    public function getName(): string
    {
        if ($this->nombre === null) {
            do {
                $numeros = rand(100, 999);
                $letra1 = range('A', 'Z');
                $letra2 = range('A', 'Z');
                $nombre = $letra1[array_rand($letra1)] . $letra2[array_rand($letra2)] . $numeros;
            } while (in_array($nombre, self::$nombres));

            self::$nombres[] = $nombre;
            $this->nombre = $nombre;
        }
        return $this->nombre;
    }

    public function reset(): void
    {

        $this->nombre = null;
        //throw new \BadMethodCallException("Implement the reset method");
    }
}
?>
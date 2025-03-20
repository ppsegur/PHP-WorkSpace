<?php
/*
Instrucciones
Determinar si un triángulo es equilátero, isósceles o escaleno.

Un triángulo equilátero tiene los tres lados de la misma longitud.

Un triángulo isósceles tiene al menos dos lados de la misma longitud. 
(A veces se especifica que tiene exactamente dos lados de la misma longitud, pero para este ejercicio 
diremos al menos dos).

Un triángulo escaleno tiene todos los lados de diferentes longitudes.

Nota
Para que una figura sea un triángulo, 
todos sus lados deben tener una longitud > 0, y 
la suma de las longitudes de dos lados cualesquiera debe ser mayor o 
igual que la longitud del tercer lado. Véase Desigualdad de Triángulos .

Profundizar
El caso en el que la suma de las longitudes de dos lados es igual a la del 
tercero se conoce como triángulo degenerado : tiene área cero y parece una sola 
línea. Siéntete libre de agregar tu propio 
código o pruebas para detectar triángulos degenerados.

*/

declare(strict_types=1);

class Triangle
{
    private  $a , $b , $c;
    public function __construct($a , $b , $c)
    {
       $this->a  = $a;
       $this->b  = $b;
       $this->c  = $c;

       // throw new \BadMethodCallException("Implement the __construct method");
    }

    public function kind(): string
    {
        $a=$this->a;
        $b=$this->b;
        $c=$this->c;
        
       // Verificar que todos los lados sean mayores que 0
       if ($a <= 0 || $b <= 0 || $c <= 0) {
        throw new Exception("Lados inválidos");
    }

    // Verificar la desigualdad del triángulo
    if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
        throw new Exception("Violación de la desigualdad del triángulo");
    }

    // Triángulo degenerado (cuando la suma de dos lados es igual al tercero)
    if ($a + $b == $c || $a + $c == $b || $b + $c == $a) {
        return "degenerate";
    }

    // Determinar el tipo de triángulo
    if ($a == $b && $b == $c) {
        return "equilateral";
    }
    if ($a == $b || $a == $c || $b == $c) {
        return "isosceles";
    }
    return "scalene";
}

       // throw new \BadMethodCallException("Implement the kind method");
    }

?>
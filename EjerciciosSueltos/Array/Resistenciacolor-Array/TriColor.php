<?php 

/*

 Instrucciones
Si quieres construir algo con una Raspberry Pi, probablemente usarás resistencias 
. Para este ejercicio, solo necesitas saber tres cosas sobre ellas:

Cada resistencia tiene un valor de resistencia.

Las resistencias son pequeñas, tan pequeñas que si se imprimiera su valor, 
sería difícil de leer. Para solucionar este problema, los fabricantes 
imprimen bandas de colores en las resistencias para indicar sus valores.

Cada banda actúa como un dígito de un número. Por ejemplo, si se imprime 
una banda marrón (valor 1) seguida de una banda verde (valor 5), se traduciría 
al número 15. En este ejercicio, crearás un programa útil para que no tengas 
que recordar los valores de las bandas. El programa tomará tres colores como 
entrada y mostrará el valor correcto en ohmios. Las bandas de color se codifican 
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

En Resistor Color Duo, decodificaste los dos primeros colores. 
Por ejemplo: naranja-naranja obtuvo el valor principal 33. 
El tercer color representa la cantidad de ceros que se deben agregar al valor principal. 
El valor principal más los ceros nos da un valor en ohmios. 
Para el ejercicio, no importa cuántos ohmios sean realmente. Por ejemplo:

naranja-naranja-negro sería 33 y sin ceros, lo que se convierte en 33 ohmios.
naranja-naranja-rojo sería 33 y 2 ceros, lo que se convierte en 3300 ohmios.
naranja-naranja-naranja sería 33 y 3 ceros, lo que se convierte en 33000 ohmios.
(Si las matemáticas son lo tuyo, quizás quieras pensar en los ceros como exponentes de 10. 
Si las matemáticas no son lo tuyo, usa los ceros. En realidad es lo mismo, solo que en un 
lenguaje sencillo en lugar de jerga matemática).

Este ejercicio consiste en traducir los colores en una etiqueta:

"...ohmios"

Por lo tanto, una entrada "orange", "orange", "black"debería devolver:

"33 ohmios"

Cuando se trata de resistencias más grandes, se usa un prefijo métrico 
para indicar una magnitud mayor de ohmios, como "kiloohmios". 
Esto es similar a decir "2 kilómetros" en lugar de "2000 metros", o "2 kilogramos" en lugar de "2000 gramos".

Por ejemplo, una entrada de "orange", "orange", "orange"debería devolver:

"33 kiloohmios"
 */





declare(strict_types=1);
class ResistorColorTrio
{
    public function label(array $input): string
    {
        $color = [
            'black'  =>  '0',
            'brown'  =>  '1',
            'red'    =>  '2',
            'orange' =>  '3', 
            'yellow' =>  '4', 
            'green'  =>  '5',
            'blue'   =>  '6', 
            'violet' =>  '7',
            'grey'   =>  '8', 
            'white'  =>  '9'
        ];
        if ($input[0] == 'black')
            $label = $color[$input[1]];
        else
            $label = $color[$input[0]].$color[$input[1]];
        $label = $this->addZeros($label, $color[$input[2]]);
        
        return $label;
    }
    public function addZeros($label, $int)
    {
        $kilo = 1000;
        $mega = 1_000_000;
        $giga = 1_000_000_000;
        
        $label .= substr(strval(10 ** intval($int)), 1);
        $label_int = intval($label);
        if ($label_int == 0)
            return $label. ' ohms';
        
        if ($label_int % $giga === 0)
            return strval(intdiv($label_int, $giga)). ' gigaohms';
        elseif ($label_int % $mega === 0)
            return strval(intdiv($label_int, $mega)). ' megaohms';
        elseif ($label_int % $kilo === 0)
            return strval(intdiv($label_int, $kilo)). ' kiloohms';
        else
            return $label.' ohms';
    }
}
?>
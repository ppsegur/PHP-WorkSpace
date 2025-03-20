<?php
/*Introducción
En el místico pueblo de Coinholt, te encuentras tras el mostrador de tu panadería, 
preparando una hornada de pasteles. La puerta se abre con un crujido y entra Denara, 
una hábil comerciante con un ojo especial para los productos de calidad. 
Tras una comida rápida, desliza una moneda reluciente por el mostrador, q
ue representa un valor de 100 unidades.

Sonríes, tomas la moneda y miras el precio total de la comida: 88 unidades. 
Eso significa que tienes que devolver 12 unidades de cambio.

Denara extiende la mano expectante. "Solo dame la menor cantidad de monedas", dice con una sonrisa. 
"Mi bolsa ya está llena y no quiero arriesgarme a perderlas en el camino".

Sabes que tienes varias opciones. "Tenemos Lumis (valor de 10 unidades), 
Viras (valor de 5 unidades) y Zenth (valor de 2 unidades) disponibles para cambio".

Calcula rápidamente las posibilidades en tu cabeza:

un Lumis (1 × 10 unidades) + un Zenth (1 × 2 unidades) = 2 monedas en total
dos Viras (2 × 5 unidades) + un Zenth (1 × 2 unidades) = 3 monedas en total
seis Zenth (6 × 2 unidades) = 6 monedas en total
—La mejor opción son dos monedas: una Lumis y una Zenth —dices, entregándole el cambio.

Denara sonríe, visiblemente impresionada. "Como siempre, has acertado".

Instrucciones
Determinar la menor cantidad de monedas que se le debe dar a un cliente 
para que la suma de sus valores sea igual a la cantidad correcta de cambio.

Ejemplos
Una cantidad de 15 con valores de monedas disponibles [1, 5, 10, 25, 100] debería devolver una moneda de valor 5 
y una moneda de valor 10, o [5, 10].
Una cantidad de 40 con valores de monedas disponibles [1, 5, 10, 25, 100] 
debería devolver una moneda de valor 5, una moneda de valor 10 y una moneda de valor 25, o [5, 10, 25]. 
*/

declare(strict_types=1);

$coins = [1, 5, 10, 25, 100];
function findFewestCoins(array $coins, int $amount): array
{
    

    //throw new \BadFunctionCallException("Implement the findFewestCoins function");
}
?>
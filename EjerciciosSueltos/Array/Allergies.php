<?php
/*
Instrucciones
Dado el puntaje de alergia de una persona, 
determine si es alérgica o no a un artículo 
determinado y su lista completa de alergias.

Una prueba de alergia produce una puntuación 
numérica única que contiene información sobre 
todas las alergias que tiene la persona (para las que se le realizaron pruebas).

La lista de artículos (y su valor) que fueron probados son:

huevos (1)
cacahuetes (2)
mariscos (4)
fresas (8)
tomates (16)
chocolate (32)
polen (64)
gatos (128)
Entonces, si Tom es alérgico a los cacahuetes y al chocolate, obtiene una puntuación de 34.

Ahora, dado sólo ese puntaje de 34, su programa debería poder decir:

Si Tom es alérgico a alguno de los alérgenos enumerados anteriormente.
Todos los alérgenos a los que Tom es alérgico.
Nota: Una puntuación dada puede incluir alérgenos no mencionados anteriormente 
(por ejemplo, alérgenos con una puntuación de 256, 512, 1024, etc.). 
Su programa debe ignorar estos componentes de la puntuación. 
Por ejemplo, si la puntuación de alergia es 257, 
su programa solo debe reportar la alergia a los huevos (1).
*/
 declare(strict_types=1);

class Allergies
{
    public function __construct(private int $score) {}

    public function isAllergicTo(Allergen $allergen): bool
    {
        return (bool)($this->score & $allergen->score);
    }

    public function getList(): array
    {
        return array_filter(Allergen::allergenList(), fn(Allergen $allergen): bool => $this->isAllergicTo($allergen));
    }
}

class Allergen
{
    public const EGGS = 1;
    public const PEANUTS = 2;
    public const SHELLFISH = 4;
    public const STRAWBERRIES = 8;
    public const TOMATOES = 16;
    public const CHOCOLATE = 32;
    public const POLLEN = 64;
    public const CATS = 128;
    
    public function __construct(public readonly int $score) {}

    public function getScore(): int
    {
        return $this->score;
    }

    public static function allergenList(): array
    {
        return [ new self(self::EGGS),
                 new self(self::PEANUTS),
                 new self(self::SHELLFISH),
                 new self(self::STRAWBERRIES),
                 new self(self::TOMATOES),
                 new self(self::CHOCOLATE),
                 new self(self::POLLEN),
                 new self(self::CATS), ];
    }
}
?>
<?php
/* 
Introducción
La clase de kínder está aprendiendo sobre el cultivo de plantas. 
La maestra pensó que sería buena idea darles semillas para que las 
planten y cultiven en la tierra. Para ello, los niños colocaron vasitos 
en los alféizares de las ventanas y plantaron un tipo de planta en cada 
uno. Pudieron elegir sus favoritas entre cuatro tipos de semillas disponibles: 
césped, trébol, rábanos y violetas.

Instrucciones
Su tarea es, dado un diagrama, determinar de qué plantas es responsable cada 
niño de la clase de jardín de infantes.

Hay 12 niños en la clase:

Alice, Bob, Charlie, David, Eva, Fred, Ginny, Harriet, Ileana, Joseph, Kincaid y Larry.
Se plantan cuatro tipos diferentes de semillas:

Planta	Codificación de diagramas
Césped	G
Trébol	C
Rábano	R
Violeta	V
Cada niño recibe cuatro tazas, dos en cada fila:

[window][window][window]
........................ # each dot represents a cup
........................
Su maestra asigna tazas a los niños en orden alfabético según sus nombres, lo que significa 
que Alice viene primero y Larry viene último.

Aquí hay un diagrama de ejemplo que representa las plantas de Alice:

[window][window][window]
VR......................
RG......................
En la primera fila, cerca de las ventanas, tiene una violeta y un rábano. En la segunda fila, 
un rábano y un poco de hierba.

Su programa recibirá las plantas de izquierda a derecha, comenzando por la fila más cercana a 
las ventanas. A partir de esto, debería poder determinar qué plantas pertenecen a cada estudiante.

Por ejemplo, si se dice que el jardín se ve así:

[window][window][window]
VRCGVVRVCGGCCGVRGCVCGCGV
VRCCCGCRRGVCGCRVVCVGCGCV
Luego, si se le solicitan las plantas de Alicia, debería proporcionar:

Violetas, rábanos, violetas, rábanos
Al pedir las plantas de Bob obtendríamos:

Trébol, hierba, trébol, trébol */


declare(strict_types=1);

class KindergartenGarden
{
    private $rows;
    public array $students = [
        'Alice', 'Bob', 'Charlie', 'David', 'Eve', 'Fred', 'Ginny', 'Harriet', 'Ileana', 'Joseph', 'Kincaid', 'Larry'
    ];
    public array $plants = [
        'G' => 'grass',
        'C' => 'clover',
        'R' => 'radishes',
        'V' => 'violets'
    ];
    public function __construct(string $diagram)
    {
        $this->rows = explode("\n", $diagram);

        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }

    public function plants(string $student): array
    {
        $index = array_search($student, $this->students);
        foreach($this->rows as $row){
            $plants[] = $this->plants[$row[$index * 2]];
            $plants[] = $this->plants[$row[$index * 2 + 1]];
        }
       

        return $plants;

        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }
}


?>
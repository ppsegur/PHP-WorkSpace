<?php
/** Dados dos baldes de diferente tamaño y cuál balde llenar primero, determine cuántas acciones se requieren para medir
 *  una cantidad exacta de litros transfiriendo líquido estratégicamente entre los baldes.

*Hay algunas reglas que tu solución debe seguir:
*Sólo puedes realizar una acción a la vez.
*Sólo hay 3 acciones posibles:
*Verter un balde en el otro balde hasta que: a) el primer balde esté vacío b) el segundo balde esté lleno
*Vaciar un cubo y no hacer nada con el otro.
*Llenar un cubo y no hacer nada en el otro.
*Después de una acción, es posible que no llegues a un estado en el que el cubo inicial esté vacío y el otro cubo esté lleno.
*Su programa tomará como entrada:

*del tamaño de un cubo
*el tamaño de un cubo dos
*el número de litros deseado a alcanzar
*¿Qué cubo llenar primero, el cubo uno o el cubo dos?
*Su programa debe determinar:

*el número total de acciones que se deben realizar para alcanzar la cantidad deseada de litros, 
*incluido el primer llenado del cubo de inicio
*¿Qué cubo debería terminar con la cantidad deseada de litros: el cubo uno o el cubo dos?
*¿Cuántos litros quedan en el otro cubo?
*Nota: cada vez que se realiza un cambio en uno o ambos depósitos se considera una (1) acción.

*Ejemplo: El cubo uno tiene una capacidad de hasta 7 litros y el cubo dos, de hasta 11 litros. 
*Supongamos que, en un paso dado, el cubo uno tiene una capacidad de 7 litros y el cubo dos, de 8 litros (7,8).
* Si vacía el cubo uno y no realiza cambios en el cubo dos, quedando con 0 y 8 litros respectivamente (0,8), 
* eso cuenta como una acción. En cambio, si hubiera vertido del cubo uno al cubo dos hasta llenar el cubo dos, 
* resultando en 4 litros en el cubo uno y 11 litros en el cubo dos (4,11), eso también contaría como una sola acción.

*Otro ejemplo: El cubo uno tiene capacidad para 3 litros y el cubo dos, hasta 5 litros.
* Se te indica que debes empezar con el cubo uno. Así que tu primera acción es llenar el cubo uno.
*  Para la segunda acción, decides vaciar el cubo uno. Para la tercera acción, no puedes llenar el cubo dos,
*  ya que esto infringe la tercera regla: no puedes terminar en un estado después de cualquier acción en el
*  que el cubo inicial esté vacío y el otro lleno.*/
declare(strict_types=1);
class TwoBucket{

    private function gcd($a, $b) {
        return $b == 0 ? $a : $this->gcd($b, $a % $b);
    }

    public function solve(int $sizeBucketOne, int $sizeBucketTwo, int $goal, string $startBucket)
    {
        $actions = 0;
        $visited = [];
        $primarySize = $startBucket === 'one' ? $sizeBucketOne : $sizeBucketTwo;
        $secondarySize = $startBucket === 'one' ? $sizeBucketTwo : $sizeBucketOne;
        $primary = 0;
        $secondary = 0;

        // Si el objetivo es mayor que ambos cubos, es imposible
        if ($goal > $primarySize && $goal > $secondarySize) {
            throw new \Exception('Imposible alcanzar el objetivo: el objetivo es mayor que ambos cubos');
        }

        // Si el objetivo no es múltiplo del MCD de los tamaños, es imposible
        if ($goal % $this->gcd($primarySize, $secondarySize) !== 0) {
            throw new \Exception('Imposible alcanzar el objetivo: el objetivo no es múltiplo del MCD de los tamaños');
        }

        // Inicializar ambos cubos antes de cualquier comprobación especial
        $primary = 0;
        $secondary = 0;

        // Caso especial: un solo paso si el cubo inicial ya tiene el objetivo
        if ($primarySize === $goal) {
            $primary = $primarySize;
            $actions = 1;
            $result = new \stdClass();
            $result->numberOfActions = $actions;
            $result->nameOfBucketWithDesiredLiters = $startBucket;
            $result->litersLeftInOtherBucket = 0;
            return $result;
        }
        // Si el cubo secundario tiene el tamaño exacto del objetivo y se empieza con el cubo uno,
        // se requieren dos acciones: llenar el cubo uno y transferir al cubo dos
        if ($secondarySize === $goal && $startBucket === 'one') {
            $primary = $primarySize;
            $secondary = 0;
            $actions = 1;
            // transferir
            $primaryAntes = $primary; // Guardamos el valor antes de transferir
            $transfer = min($primary, $secondarySize - $secondary);
            $primary -= $transfer;
            $secondary += $transfer;
            $actions++;
            $result = new \stdClass();
            $result->numberOfActions = $actions;
            $result->nameOfBucketWithDesiredLiters = 'two';
            $result->litersLeftInOtherBucket = $primaryAntes;
            return $result;
        }
        // Si se empieza con el cubo dos y su tamaño es el objetivo, solo una acción
        if ($secondarySize === $goal && $startBucket === 'two') {
            $secondary = $secondarySize;
            $actions = 1;
            $result = new \stdClass();
            $result->numberOfActions = $actions;
            $result->nameOfBucketWithDesiredLiters = 'two';
            $result->litersLeftInOtherBucket = 0;
            return $result;
        }

        // Primer llenado
        $primary = $primarySize;
        $actions++;

        // Comprobación especial: ¿el primer traspaso llena el secundario?
        if ($primary !== $goal && $secondary !== $goal) {
            $transfer = min($primary, $secondarySize - $secondary);
            $primary -= $transfer;
            $secondary += $transfer;
            $actions++;
            if ($primary === $goal || $secondary === $goal) {
                $result = new \stdClass();
                if ($primary === $goal) {
                    $result->numberOfActions = $actions;
                    $result->nameOfBucketWithDesiredLiters = $startBucket;
                    $result->litersLeftInOtherBucket = $secondary;
                } else {
                    $result->numberOfActions = $actions;
                    $result->nameOfBucketWithDesiredLiters = $startBucket === 'one' ? 'two' : 'one';
                    $result->litersLeftInOtherBucket = $primary;
                }
                return $result;
            }
        }

        while (true) {
            $state = $primary . ',' . $secondary;
            if (isset($visited[$state])) {
                throw new \Exception('Imposible alcanzar el objetivo: ciclo detectado');
            }
            $visited[$state] = true;

            // Si el secundario está lleno, vacíalo
            if ($secondary === $secondarySize) {
                $secondary = 0;
                $actions++;
                if ($primary === $goal || $secondary === $goal) break;
            }
            // Si el primario está vacío, llénalo
            elseif ($primary === 0) {
                $primary = $primarySize;
                $actions++;
                if ($primary === $goal || $secondary === $goal) break;
            }
            // Si ninguno de los anteriores, transfiere del primario al secundario
            else {
                $transfer = min($primary, $secondarySize - $secondary);
                $primary -= $transfer;
                $secondary += $transfer;
                $actions++;
                if ($primary === $goal || $secondary === $goal) break;
            }
        }

        $result = new \stdClass();
        if ($primary === $goal) {
            $result->numberOfActions = $actions;
            $result->nameOfBucketWithDesiredLiters = $startBucket;
            $result->litersLeftInOtherBucket = $secondary;
        } else {
            $result->numberOfActions = $actions;
            $result->nameOfBucketWithDesiredLiters = $startBucket === 'one' ? 'two' : 'one';
            $result->litersLeftInOtherBucket = $primary;
        }
        return $result;
    }
}
?>
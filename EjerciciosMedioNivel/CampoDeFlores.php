<?php 
/**
 * Tu tarea consiste en sumar flores a las casillas vacías de un jardín de Campo de Flores completo.
 * El jardín es un tablero rectangular compuesto por casillas vacías (' ') o con una flor ('*').
 *
 * En cada casilla vacía, cuenta el número de flores adyacentes (horizontal, vertical y diagonalmente).
 * Si la casilla vacía no tiene flores adyacentes, déjala vacía. De lo contrario, reemplázala con el número de flores adyacentes.
 *
 * Por ejemplo, puedes recibir un tablero de 5 x 4 como éste (los espacios vacíos se representan aquí con el carácter '·' para su visualización en la pantalla):
 *
 * ·*·*·
 * ··*··
 * ··*··
 * ·····
 *
 * Tu código debería transformarse en esto:
 *
 * 1*3*1
 * 13*31
 * ·2*2·
 * ·111·
 *
 * como si fuera las instrucciones del ejercicio.
 */
declare(strict_types=1);

class FlowerField
{
    private $garden;

    public function __construct(array $garden)
    {
        $this->garden = $garden;
    }
    

    public function annotate(): array
    {
        $rows = count($this->garden);
        if ($rows === 0) return [];
        $cols = strlen($this->garden[0]);
        $result = [];
        for ($i = 0; $i < $rows; $i++) {
            $row = '';
            for ($j = 0; $j < $cols; $j++) {
                if ($this->garden[$i][$j] === '*') {
                    $row .= '*';
                } else {
                    $count = 0;
                    for ($di = -1; $di <= 1; $di++) {
                        for ($dj = -1; $dj <= 1; $dj++) {
                            if ($di === 0 && $dj === 0) continue;
                            $ni = $i + $di;
                            $nj = $j + $dj;
                            if ($ni >= 0 && $ni < $rows && $nj >= 0 && $nj < $cols) {
                                if ($this->garden[$ni][$nj] === '*') {
                                    $count++;
                                }
                            }
                        }
                    }
                    $row .= $count > 0 ? (string)$count : ' ';
                }
            }
            $result[] = $row;
        }
        return $result;
    }
}

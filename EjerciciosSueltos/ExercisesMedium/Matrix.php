<?php
/*
Instrucciones
Dada una cadena que representa una matriz de números, devuelve las filas y columnas de esa matriz.

Entonces, dada una cadena con nuevas líneas incrustadas como:

9 8 7
5 3 2
6 6 7
representando esta matriz:

    1  2  3
  |---------
1 | 9  8  7
2 | 5  3  2
3 | 6  6  7
Su código debería poder mostrar:

Una lista de las filas, leyendo cada fila de izquierda a derecha mientras se mueve de arriba a abajo a través de las filas,
Una lista de las columnas, leyendo cada columna de arriba a abajo mientras se mueve de izquierda a derecha.
Las filas de nuestra matriz de ejemplo:

9, 8, 7
5, 3, 2
6, 6, 7
Y sus columnas:

9, 5, 6
8, 3, 6
7, 2, 7
*/

declare(strict_types=1);

class Matrix
{
    private array $matrix;
    public function __construct(string $matrix)
    {
        $matrix = explode("\n", $matrix);
        $this->matrix = array_map(function ($row) {
            return array_map('intval', explode(' ', $row));
        }, $matrix);
    
       // throw new BadFunctionCallException("Please implement the Matrix class!");
    }

    public function getRow(int $rowId): array
    {
        return $this->matrix[$rowId - 1];

       // throw new BadFunctionCallException("Please implement the getRow method!");
    }

    public function getColumn(int $columnId): array
    {
        return array_map(function ($row) use ($columnId) {
            return $row[$columnId - 1];
        }, $this->matrix);
        //throw new BadFunctionCallException("Please implement the getColumn method!");
    }
}

?>
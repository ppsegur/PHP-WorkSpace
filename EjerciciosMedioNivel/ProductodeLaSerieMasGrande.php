<?php
/**
 * Ejercicio: Buscar patrones en una larga secuencia de dígitos de una señal cifrada utilizando la técnica de "producto de la serie más grande".
 *
 * Instrucciones:
 * 1. Se te proporciona una entrada, que es una secuencia de dígitos.
 * 2. Debes identificar todas las posibles series de dígitos adyacentes dentro de la entrada, donde cada serie tiene una longitud definida por el parámetro "span".
 * 3. Para cada serie, calcula el producto de sus dígitos.
 * 4. Determina cuál de todas las series tiene el mayor producto.
 * 5. Devuelve el valor del mayor producto encontrado.
 *
 * Ejemplo:
 * Entrada: "63915"
 * Span: 3
 * Series posibles: "639", "391", "915"
 * Productos: 162 (6×3×9), 27 (3×9×1), 45 (9×1×5)
 * Resultado: 162 (mayor producto)
 */


declare(strict_types=1);

class Series
{
    private $input;

    public function __construct(string $input)
    {
        if (!preg_match('/^\d*$/', $input)) {
            throw new \InvalidArgumentException("La entrada debe contener solo dígitos");
        }
        $this->input = $input;
    }

    public function largestProduct(int $span): int
    {
        if ($span < 0) {
            throw new \InvalidArgumentException("El span no puede ser negativo");
        }
        if ($span === 0) {
            return 1;
        }
        if ($span > strlen($this->input)) {
            throw new \InvalidArgumentException("El span es mayor que la longitud de la entrada");
        }
        $maxProduct = 0;
        for ($i = 0; $i <= strlen($this->input) - $span; $i++) {
            $product = 1;
            for ($j = 0; $j < $span; $j++) {
                $digit = (int)$this->input[$i + $j];
                $product *= $digit;
            }
            if ($product > $maxProduct) {
                $maxProduct = $product;
            }
        }
        return $maxProduct;
    }
}

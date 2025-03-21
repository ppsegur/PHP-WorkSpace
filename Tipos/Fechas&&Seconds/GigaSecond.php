<?php
/** 
 * 
 * Instrucciones
*Su tarea es determinar la fecha y la hora un gigasegundo después de una fecha determinada.

*Un gigasegundo son mil millones de segundos. Es decir, un uno con nueve ceros después.

*Si naciste el 24 de enero de 2015 a las 22:00 (22:00:00) , 
*entonces tendrías un gigasegundo el 2 de octubre de 2046 a las 23:46:40 (23:46:40) .
 * 
 * 
 */

 declare(strict_types=1);

 function from(DateTimeImmutable $date): DateTimeImmutable
 {
    //$date es una fecha a la cual debemos sumarle un gigasegundo
    //Un gigasegundo son mil millones de segundos. Es decir, un uno con nueve ceros después.
    //Para sumar un gigasegundo a una fecha, debemos sumarle 1000000000 segundos
    //    //throw new \BadFunctionCallException("Implement the from function");
    return $date->add(new DateInterval('PT1000000000S'));

}
?>
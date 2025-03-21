<?php
/**
 * Instrucciones
  *Tu tarea es crear un componente de alta puntuación del clásico juego 
  *Frogger, uno de los juegos más vendidos y adictivos de todos los tiempos, 
  *y un clásico de la era arcade. Tu tarea consiste en escribir métodos que 
  *devuelvan la puntuación más alta de la lista, la última puntuación añadida 
  *y las tres puntuaciones más altas
 */


declare(strict_types=1);

class HighScores
{

 

    



    public function __construct(array $scores)
    {
        $this->scores = $scores;
        //Para sacar el ultimo elemento de un array
        $this->latest = $scores[count($scores) - 1];
        //Para sacar el mayor elemento de un array
        $this->personalBest =  max($scores);
        //Para sacar los 3 elementos mas altos de un array

        $this->personalTopThree = $this-> top3Scores($scores);

        //throw new \BadFunctionCallException("Implement the HighScores class");
    }
    public function top3Scores(array $scores): array
    {
        $this->top3 = $scores;
        rsort($scores);
       return  $this->top3 = array_slice($scores, 0, 3);
        
    }
   
}
?>
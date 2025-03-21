<?php
/*
ntroducción
Cada mes, tu pareja queda con su mejor amigo. Ambos tienen agendas muy ocupadas, 
¡lo que dificulta encontrar una cita adecuada! Dado tu apretada agenda, tu pareja 
siempre revisa las posibles fechas de encuentro contigo:

"¿Puedo reunirme el primer viernes del próximo mes?"
"¿Qué pasa con el tercer miércoles?"
"¿Quizás el último domingo?"
En la llamada de este mes, tu pareja te hizo esta pregunta:

"Me gustaría reunirme el jueves número diecisiete; ¿está bien?"
Confundido, preguntas qué es un día "decimoquinto". Tu compañero 
explica que un día decimoquinto, un concepto inventado por ellos, 
se refiere a los días del mes que terminan en "-decimoquinto":

13º (decimotercero)
14º (decimocuarto)
15 (decimoquinto)
16 (decimosexto)
17 (decimoséptimo)
18 (decimoctavo)
19 (decimonoveno)
Como también hay siete días de la semana, se garantiza que cada día de la semana 
tiene exactamente un decimoquinto día cada mes.

Ahora que entiendes el concepto del decimoquinto día, revisas tu calendario. 
No tienes nada planeado para el decimoquinto jueves, así que confirmas la fecha con tu pareja. 


Instrucciones
Su tarea es encontrar la fecha exacta de una reunión, 
teniendo en cuenta un mes, un año, un día de la semana y una semana.

Hay cinco valores semanales a considerar: first, second, third, fourth, last, teenth.

Por ejemplo, es posible que se le pida que busque la fecha de la reunión del primer lunes de enero de 2018 
(1 de enero de 2018).

De manera similar, es posible que se le pida encontrar:

el tercer martes de agosto de 2019 (20 de agosto de 2019)
el decimotercer miércoles de mayo de 2020 (13 de mayo de 2020)
el cuarto domingo de julio de 2021 (25 de julio de 2021)
el último jueves de noviembre de 2022 (24 de noviembre de 2022)
el decimoquinto sábado de agosto de 1953 (15 de agosto de 1953)
Décimo
La decimoquinta semana se refiere a los siete días de un mes 
que terminan en '-decimoquinto' (13, 14, 15, 16, 17, 18 y 19).

Si nos piden encontrar el decimoquinto sábado de agosto de 1953, consultamos su calendario:
*/

declare(strict_types=1);

function meetup_day(int $year, int $month, string $which, string $weekday): DateTimeImmutable
{
    $date = new DateTimeImmutable("$year-$month-01");
    $date = $date->modify("next $weekday");
    // Cuando el decimoquinto dia es lunes 13, el primer dia de la decimoquinta semana
    
    
    //Lo vamos a dejar aqui por lo pronto
    
    //throw new \BadFunctionCallException("Implement the meetup_day function");
}

?>
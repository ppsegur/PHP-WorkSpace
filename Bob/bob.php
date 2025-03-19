<?php
/*Introducción
Bob es un adolescente despreocupado . 
Le gusta creerse genial. 
Y definitivamente no se emociona 
con nada. Eso no sería genial.

Cuando la gente habla con él, 
sus respuestas son bastante limitadas.

Instrucciones
Tu tarea es determinar qué le 
responderá Bob a alguien cuando 
le diga algo o le haga una pregunta.

Bob sólo responde una de cinco cosas:

"Claro." Esta es su respuesta si le 
preguntas algo como "¿Cómo estás?". 
La convención para las preguntas es 
terminar con un signo de interrogación.
"¡Tranquilo!". Esta es su respuesta si 
le gritas. La convención para gritar es 
TuDO EN MAYÚSCULAS.
"¡Tranquilo, sé lo que hago!", 
dice si le gritas una pregunta.
"¡Bien! ¡Así!" Así responde al silencio. 
La convención para el silencio es nada, o 
varias combinaciones de espacios en 
blanco.
"Lo que sea." Esto es lo que 
responde a cualquier otra cosa. */
declare(strict_types=1);

class Bob
{
    public function respondTo(string $str): string
    {
        // Elimina los espacios en blanco al inicio y al final de la cadena
        $trimmedStr = trim($str);

        // Si la cadena está vacía después de recortarla, significa que está en silencio
        if ($trimmedStr === '') {
            return "Fine. Be that way!";
        }
        
        // Verifica si el texto está en mayúsculas y contiene al menos una letra (indicador de gritar)
        $isShouting = strtoupper($trimmedStr) === $trimmedStr && preg_match('/[A-Z]/', $trimmedStr);
        
        // Verifica si la última letra de la cadena es un signo de interrogación (indicador de pregunta)
        $isQuestion = substr($trimmedStr, -1) === '?';

        // Si la frase es una pregunta y está en mayúsculas, responde de manera específica
        if ($isShouting && $isQuestion) {
            return "Calm down, I know what I'm doing!";
        }
        
        // Si solo está gritando, responde con "Whoa, chill out!"
        if ($isShouting) {
            return "Whoa, chill out!";
        }
        
        // Si solo es una pregunta, responde con "Sure."
        if ($isQuestion) {
            return "Sure.";
        }
        
        // Si no cumple ninguna de las condiciones anteriores, responde con "Whatever."
        return "Whatever.";
    }
}

?>
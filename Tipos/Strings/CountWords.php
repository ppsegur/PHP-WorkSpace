<?php
/*
Introducción
Enseña inglés como lengua extranjera a estudiantes de secundaria.

Has decidido basar todo tu currículo en programas de televisión. 
Necesitas analizar qué palabras se usan y con qué frecuencia se repiten.

Esto te permitirá elegir los programas más simples para comenzar y 
aumentar gradualmente la dificultad a medida que pasa el tiempo.

Instrucciones
Tu tarea es contar cuántas veces aparece cada palabra en un subtítulo de un drama.

Los subtítulos de estos dramas utilizan únicamente caracteres ASCII.

Los personajes suelen hablar en inglés informal, usando contracciones como " they're" o " it's" . 
Aunque estas contracciones se forman a partir de dos palabras (p. ej., " we are "), la contracción 
( we're ) se considera una sola palabra.

Las palabras pueden separarse mediante cualquier signo de puntuación (p. ej., ":", "!" o "?") 
o espacios en blanco (p. ej., "\t", "\n" o " "). El único signo de puntuación que no separa 
las palabras es el apóstrofo en las contracciones.

Los números se consideran palabras. Si los subtítulos dicen "Cuesta 100 dólares", entonces 
100 será su propia palabra.

Las palabras no distinguen entre mayúsculas y minúsculas. Por ejemplo, la palabra "tú" aparece 
tres veces en la siguiente oración:

Vuelve, ¿me oyes? ¿ME OYES?

El orden en que aparecen las palabras en los resultados no importa.

A continuación se muestra un ejemplo que incorpora varios de los elementos analizados anteriormente:

palabras sencillas
contracciones
números
palabras que no distinguen entre mayúsculas y minúsculas
Puntuación (incluidos los apóstrofes) para separar palabras
Diferentes formas de espacios en blanco para separar palabras

*/

declare(strict_types=1);

function wordCount(string $words): array
{
    $solucion = [];
    $words = preg_replace('/[^a-zA-Z0-9\'\s]/', '', $words);
    $words = strtolower($words);
    $words = preg_split('/\s+/', $words);
    $words = array_count_values($words);
    foreach ($words as $key => $value) {
        if ($key != '') {
            $solucion[$key] = $value;
        }
    }
    return $solucion;  
    //throw new \BadFunctionCallException("Implement the wordCount function");
}


?>
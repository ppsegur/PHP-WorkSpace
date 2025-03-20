<?php
/* 
Introducción
En algunos acentos ingleses, al decir "dos por" rápidamente, 
suena como "dos por uno". Dos por uno significa que si compras uno, 
también te regalan otro. Por lo tanto, la frase "dos por uno" suele 
implicar una oferta de dos por uno.

Imagina una panadería con una oferta navideña donde puedes comprar dos 
galletas por el precio de una ("¡dos por uno!"). Aceptas la oferta y 
(con mucha generosidad) decides regalar la galleta extra a alguien de la fila.

Instrucciones
Tu tarea es determinar lo que dirás mientras entregas la galleta extra.

Si conoces el nombre de la persona (por ejemplo, si se llama Do-yun), entonces dirás:

One for Do-yun, one for me.
Si no conoces el nombre de la persona, dirás " tú" en su lugar.

One for you, one for me.
A continuación se muestran algunos ejemplos:

Nombre	Diálogo
Alicia	Uno para Alice, uno para mí.
Bohdan	Uno para Bohdan, uno para mí.
Uno para ti, uno para mí.
Zaphod	Uno para Zaphod, uno para mí.
*/

declare(strict_types=1);

function twoFer(string $name = ''): string
{
    if ($name == '' ||  (trim($name) === '') ) {
        return "One for you, one for me.";
    }  else {
        return "One for $name, one for me.";
    }
    //throw new \BadFunctionCallException("Implement the twoFer function");
}

?>
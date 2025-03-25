<?php
/*
Instrucciones
Instrucciones
Recita la canción infantil 'Esta es la casa que Jack construyó'.

El proceso de colocar una frase de una cláusula dentro 
de otra se denomina incrustación. Mediante los procesos 
de recursión e incrustación, podemos tomar un número finito 
de formas (palabras y frases) y construir un número infinito 
de expresiones. Además, la incrustación también nos permite 
construir una estructura infinitamente larga, al menos en teoría.

papir.com
La canción infantil dice lo siguiente:

This is the house that Jack built.

This is the malt
that lay in the house that Jack built.

This is the rat
that ate the malt
that lay in the house that Jack built.

This is the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the man all tattered and torn
that kissed the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the priest all shaven and shorn
that married the man all tattered and torn
that kissed the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the rooster that crowed in the morn
that woke the priest all shaven and shorn
that married the man all tattered and torn
that kissed the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the farmer sowing his corn
that kept the rooster that crowed in the morn
that woke the priest all shaven and shorn
that married the man all tattered and torn
that kissed the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.

This is the horse and the hound and the horn
that belonged to the farmer sowing his corn
that kept the rooster that crowed in the morn
that woke the priest all shaven and shorn
that married the man all tattered and torn
that kissed the maiden all forlorn
that milked the cow with the crumpled horn
that tossed the dog
that worried the cat
that killed the rat
that ate the malt
that lay in the house that Jack built.





*/

declare(strict_types=1);

class House
{
    private const WORDS = [
        1 => ['house that Jack built.', ''],
        ['malt', 'lay in'],
        ['rat', 'ate'],
        ['cat', 'killed'],
        ['dog', 'worried'],
        ['cow with the crumpled horn', 'tossed'],
        ['maiden all forlorn', 'milked'],
        ['man all tattered and torn', 'kissed'],
        ['priest all shaven and shorn', 'married'],
        ['rooster that crowed in the morn', 'woke'],
        ['farmer sowing his corn', 'kept'],
        ['horse and the hound and the horn', 'belonged to'],
    ];

   
    public function verse(int $verseNumber): array
    {
        $lines = ['This is the ' . static::WORDS[$verseNumber][0]];
        while ($verseNumber > 1) {
            $lines[] = sprintf(
                'that %s the %s',
                static::WORDS[$verseNumber][1],
                static::WORDS[$verseNumber-1][0],
            );
            $verseNumber--;
        }
        return $lines;
    }

    public function verses(int $start, int $end): array
    {
        $lyrics = [];
        for ($i = $start; $i <= $end; $i++) {
             $lyrics[] = '';
             $lyrics = [...$lyrics, ...$this->verse($i)];
        }
             
        return array_slice($lyrics, 1);
        //throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
    }
}


?>
<?php
/*
El ejercicio de Markdown es un ejercicio de refactorización. 
Hay código que analiza una cadena dada con sintaxis Markdown 
y devuelve el HTML asociado. Aunque este código está escrito 
de forma confusa y es difícil de seguir, ¡de alguna manera 
funciona y todas las pruebas pasan! El reto es reescribir 
este código para que sea más fácil de leer y mantener, 
asegurándose de que todas las pruebas sigan pasando.

Sería útil que anotaras lo que hiciste en tu refactorización 
en los comentarios para que los revisores puedan verlo, 
pero no es estrictamente necesario. ¡Lo más importante es mejorar el código!
*/




declare(strict_types=1);

function parseMarkdown(string $markdown): string
{
    $lines = explode("\n", trim($markdown));
    $html = '';
    $inList = false;

    foreach ($lines as $line) {
        $line = trim($line);

        if (empty($line)) {
            if ($inList) {
                $html .= "</ul>";
                $inList = false;
            }
            continue;
        }

        if (preg_match('/^(#{1,6})\s+(.*)$/', $line, $matches)) {
            if ($inList) {
                $html .= "</ul>";
                $inList = false;
            }
            $level = strlen($matches[1]);
            $html .= "<h{$level}>{$matches[2]}</h{$level}>";
            continue;
        }

        if (preg_match('/^\*\s+(.*)$/', $line, $matches)) {
            if (!$inList) {
                $html .= "<ul>";
                $inList = true;
            }
            
            $content = formatText($matches[1]);
            // Solo agregamos <p> si el contenido no tiene formato especial
            if (strpos($content, '<em>') === false && strpos($content, '<i>') === false) {
                $html .= "<li><p>{$content}</p></li>";
            } else {
                $html .= "<li>{$content}</li>";
            }
            continue;
        }

        if ($inList) {
            $html .= "</ul>";
            $inList = false;
        }

        $html .= "<p>" . formatText($line) . "</p>";
    }

    if ($inList) {
        $html .= "</ul>";
    }

    return $html;
}

function formatText(string $text): string
{
    $text = preg_replace('/__(.*?)__/', '<em>$1</em>', $text);
    $text = preg_replace('/_(.*?)_/', '<i>$1</i>', $text);
    return $text;
}

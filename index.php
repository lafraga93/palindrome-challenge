<?php

declare(strict_types=1);

function isPalindromeString(string $string): void
{    
    $stringLength = strlen($string);

    if ($stringLength <= 1 || $stringLength >= 100) {
        die('deve estar no intervalo entre 2 e 99');
    }

    if (!mb_detect_encoding($string, ['ASCII', 'UTF-8'], true) || !ctype_lower($string)) {
        die('deve ser ascii E MINUSCULO');
    }

    $characteresArray = array_unique(str_split($string), SORT_STRING);

    if (strlen($string) % 2 === 0) {
        foreach ($characteresArray as $char) {
            $charOccurrences = substr_count($string, $char);
            if ($charOccurrences % 2 !== 0) {
                die('não pode ser palindrome');
            }
        }
        die('pode ser palindrome');
    } else {
        $oddOcurrences = 0;

        foreach ($characteresArray as $char) {
            $charOccurrences = substr_count($string, $char);

            if ($charOccurrences % 2 !== 1) {
                continue;
            }

            $oddOcurrences++;

            if ($oddOcurrences > 1) {
                die('não pode ser palindrome');
            }
        }
        die('pode ser palindrome');
    }
}

echo 'Resultado: ' . isPalindromeString("303");
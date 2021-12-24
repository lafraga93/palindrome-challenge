<?php

declare(strict_types=1);

namespace App;

use Exception;

class PalindromeChecker
{
    private string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function check(): string
    {
        if (!$this->canBePalindrome()) {
            return "String NÃO PODE ser um palíndromo!";
        }

        return "String PODE ser um palíndromo!";
    }

    private function canBePalindrome(): bool
    {
        $stringLength = strlen($this->string);

        if ($stringLength <= 1 || $stringLength >= 100) {
            throw new Exception("O comprimento da string deve ser entre 2 e 99 caracteres.");
        }

        if (!mb_detect_encoding($this->string, ['ASCII', 'UTF-8'], true) || !ctype_lower($this->string)) {
            throw new Exception("A string deve ser composta por letras minúsculas no intervalo ASCII.");
        }

        $characteresArray = array_unique(str_split($this->string), SORT_STRING);

        if (!$this->isOdd($stringLength)) {
            foreach ($characteresArray as $char) {
                $charOccurrencesLength = substr_count($this->string, $char);
                if ($this->isOdd($charOccurrencesLength)) {
                    return false;
                }
            }
            return true;
        }

        $oddOcurrencesLength = 0;

        foreach ($characteresArray as $char) {
            $charOccurrencesLength = substr_count($this->string, $char);

            if (!$this->isOdd($charOccurrencesLength)) {
                continue;
            }

            $oddOcurrencesLength++;

            if ($oddOcurrencesLength > 1) {
                return false;
            }
        }

        return true;
    }

    private function isOdd(int $number): bool
    {
        return $number % 2 !== 0;
    }
}

<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\PalindromeChecker;

try {
    if (!isset($argv[1])) {
        throw new Exception("Informe uma string como parâmetro.");
    }
    $checker = new PalindromeChecker($argv[1]);
    echo $checker->check() . PHP_EOL;
} catch (Exception $exception) {
    die("Ops, ocorreu um erro! Detalhes: " . $exception->getMessage() . PHP_EOL);
}

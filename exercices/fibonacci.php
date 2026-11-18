<?php

function f(int $n): int
{
    if ($n < 2) {
        return $n;
    }

    return f($n - 1) + f($n - 2);
}

function fibonacci(int $iteration): void
{
    if ($iteration < 2) {
        throw new InvalidArgumentException();
    }

    for ($i = 0; $i < $iteration; $i += 1) {
        echo f($i) . PHP_EOL;
    }
}

var_dump($argv);

fibonacci(intval($argv[1]));

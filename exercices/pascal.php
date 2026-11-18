<?php

function factor(int $n): int
{
    $result = 1;

    for ($i = 2; $i <= $n; $i += 1) {
        $result = $result * $i;
    }

    return $result;
}

function pascal(int $iterations): void
{
    $triangle = [];

    for ($i = 0; $i < $iterations; $i += 1) {
        for ($j = 0; $j <= $i; $j += 1) {
            $triangle[$i][$j] = intdiv(
                factor($i),
                factor($j) * factor($i - $j)
            );
        }
    }

    foreach ($triangle as $row) {
        echo implode(' ', $row) . PHP_EOL;
    }
}

pascal(10);
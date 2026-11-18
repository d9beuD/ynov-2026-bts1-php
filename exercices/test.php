<?php

// echo 'Hello, world!' . PHP_EOL;

$name = 'Vincent';
$age = 17;
$homme = true;
$langues = ['français', 'anglais', 'allemand'];

function write_line (string $text): void {
    echo $text . PHP_EOL;
}

function add(int $a, int $b): int
{
    return $a + $b;
}

write_line(add(1, 2));

write_line("Vous avez $age ans.");

// 17 < age > 100
if ($age >= 18 && $age <= 99) {
    write_line('Vous êtes majeur.');
    // 99 < age 
} elseif ($age > 99) {
    write_line('Êtes-vous encore vivant ?');
    // age < 18
} else {
    write_line('Vous êtes mineur.');
}

// echo $name . PHP_EOL;
// echo $age . PHP_EOL;
// echo $homme . PHP_EOL;
// echo $langues[0] . PHP_EOL;

// foreach ($langues as $langue) {
//     echo $langue . PHP_EOL;
// }

// $tentative = 0;
// while ($tentative < $age) {
//     echo "$tentative est inférieur à $age" . PHP_EOL;
    
//     $tentative++;
// }

// for ($i = 0; $i <= 20; $i += 1) {
//     echo $i . PHP_EOL;
// }

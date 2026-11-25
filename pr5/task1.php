<?php
declare(strict_types=1);

$square = fn(int $x): int => $x ** 2;
$isEven = fn(int $x): bool => $x % 2 === 0;
$greet = fn(string $name): string => "Привет, $name!";
$max = fn(int $a, int $b): int => $a > $b ? $a : $b;

echo 'Квадрат 4: ' . $square(4) . PHP_EOL;
echo 'Квадрат 9: ' . $square(9) . PHP_EOL;

echo '6 чётное: ' . var_export($isEven(6), true) . PHP_EOL;
echo '7 чётное: ' . var_export($isEven(7), true) . PHP_EOL;

echo $greet('Саня') . PHP_EOL;
echo $greet('Миха') . PHP_EOL;

echo 'Максимум из 3 и 8: ' . $max(3, 8) . PHP_EOL;
echo 'Максимум из 15 и 2: ' . $max(15, 2) . PHP_EOL;

// Классический вид функции $square:
// $square = function (int $x): int {
//     return $x ** 2;
// };
// Стрелочная запись короче: нет слова function, фигурных скобок и return.

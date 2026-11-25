<?php
declare(strict_types=1);

$discount = 0.9;

$applyDiscount = fn(float $price): float => $price * $discount;

echo 'Цены со скидкой 10%:' . PHP_EOL;
echo '1000 -> ' . $applyDiscount(1000) . PHP_EOL;
echo '2500 -> ' . $applyDiscount(2500) . PHP_EOL;
echo '399.5 -> ' . $applyDiscount(399.5) . PHP_EOL;

$discount = 0.5;

echo PHP_EOL . 'После изменения $discount на 0.5:' . PHP_EOL;
echo '1000 -> ' . $applyDiscount(1000) . PHP_EOL;

// Результат не изменился, потому что fn захватывает внешние переменные по значению в момент создания функции:
// внутри функции осталась копия $discount = 0.9, а последующее изменение внешней переменной на неё не влияет.

$rate = 90.5;

$toRubles = fn(float $price): float => $price * $rate * $discount;

echo PHP_EOL . 'Цена 20 у.е. в рублях со скидкой: ' . $toRubles(20) . PHP_EOL;
echo 'Цена 100 у.е. в рублях со скидкой: ' . $toRubles(100) . PHP_EOL;

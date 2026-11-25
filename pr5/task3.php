<?php
declare(strict_types=1);

$products = [
    ['title' => 'Книга', 'price' => 500],
    ['title' => 'Рюкзак', 'price' => 2500],
    ['title' => 'Кружка', 'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот', 'price' => 150],
];

$lines = array_map(fn(array $p): string => "{$p['title']} — {$p['price']} руб.", $products);
echo 'Список товаров:' . PHP_EOL . implode(PHP_EOL, $lines) . PHP_EOL;

$expensive = array_filter($products, fn(array $p): bool => $p['price'] > 1000);
$expensiveTitles = array_map(fn(array $p): string => $p['title'], $expensive);
echo PHP_EOL . 'Дороже 1000 руб.: ' . implode(', ', $expensiveTitles) . PHP_EOL;

$total = array_reduce($products, fn(int $sum, array $p): int => $sum + $p['price'], 0);
echo PHP_EOL . 'Общая стоимость: ' . $total . ' руб.' . PHP_EOL;

$discounted = array_map(
    fn(array $p): array => array_merge($p, ['price' => round($p['price'] * 0.85, 2)]),
    $products
);
$discountedLines = array_map(fn(array $p): string => "{$p['title']}: {$p['price']} руб.", $discounted);
echo PHP_EOL . 'Со скидкой 15%:' . PHP_EOL . implode(PHP_EOL, $discountedLines) . PHP_EOL;

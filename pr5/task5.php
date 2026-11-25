<?php
declare(strict_types=1);

$orders = [
    ['id' => 1, 'customer' => 'Иван', 'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Мария', 'total' => 800, 'status' => 'new'],
    ['id' => 3, 'customer' => 'Пётр', 'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Анна', 'total' => 600, 'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Олег', 'total' => 2100, 'status' => 'done'],
];

$byStatus = fn(string $status) => fn(array $o): bool => $o['status'] === $status;
$describe = fn(array $o): string => "Заказ №{$o['id']} — {$o['total']} руб. ({$o['customer']})";

$done = array_filter($orders, $byStatus('done'));
$cancelled = array_filter($orders, $byStatus('cancelled'));

$revenue = array_reduce($done, fn(int $sum, array $o): int => $sum + $o['total'], 0);

$big = array_filter($orders, fn(array $o): bool => $o['total'] > 1000);
$bigLines = array_map($describe, $big);

$sortedDone = array_values($done);
usort($sortedDone, fn(array $a, array $b): int => $b['total'] <=> $a['total']);
$topOrder = $sortedDone[0];

$customers = array_values(array_unique(array_map(fn(array $o): string => $o['customer'], $orders)));

echo 'Выручка по выполненным заказам: ' . $revenue . ' руб.' . PHP_EOL;

echo PHP_EOL . 'Заказы свыше 1000 руб.:' . PHP_EOL . implode(PHP_EOL, $bigLines) . PHP_EOL;

echo PHP_EOL . 'Самый дорогой выполненный заказ: ' . $describe($topOrder) . PHP_EOL;

echo PHP_EOL . 'Клиенты: ' . implode(', ', $customers) . PHP_EOL;

echo PHP_EOL . 'Статистика:' . PHP_EOL;
echo 'Всего заказов: ' . count($orders) . PHP_EOL;
echo 'Выполнено: ' . count($done) . PHP_EOL;
echo 'Отменено: ' . count($cancelled) . PHP_EOL;
echo 'Сумма выручки: ' . $revenue . ' руб.' . PHP_EOL;

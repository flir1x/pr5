<?php
declare(strict_types=1);

$students = [
    ['name' => 'Лиза', 'grade' => 4.5],
    ['name' => 'Кирилл', 'grade' => 3.2],
    ['name' => 'Вера', 'grade' => 4.8],
    ['name' => 'Глеб', 'grade' => 2.9],
];

usort($students, fn(array $a, array $b): int => $b['grade'] <=> $a['grade']);

$rating = array_map(
    fn(int $i, array $s): string => ($i + 1) . ". {$s['name']} — {$s['grade']}",
    array_keys($students),
    $students
);
echo 'Рейтинг по оценке:' . PHP_EOL . implode(PHP_EOL, $rating) . PHP_EOL;

$byName = $students;
usort($byName, fn(array $a, array $b): int => strcmp($a['name'], $b['name']));

$names = array_map(fn(array $s): string => $s['name'], $byName);
echo PHP_EOL . 'По алфавиту: ' . implode(', ', $names) . PHP_EOL;

$greaterThan = fn(float $limit) => fn(array $student): bool => $student['grade'] > $limit;

$good = array_filter($students, $greaterThan(4.0));
$goodNames = array_map(fn(array $s): string => $s['name'], $good);

echo PHP_EOL . 'Оценка выше 4.0: ' . implode(', ', $goodNames) . PHP_EOL;
echo 'Количество: ' . count($good) . PHP_EOL;

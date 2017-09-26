<?php

function convertMemory($size)
{
    if ($size == 0) {
        return '0 b';
    }

    $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
    return @round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

function generator()
{
    $amount = pow(2, 21);
    for ($i = 0; $i < $amount; $i++) {
        $number = random_int(pow(2, 0), pow(2, 15));
        yield $number;
    }
}

$startTime = microtime(true);
$startMemory = memory_get_peak_usage(true);


$number = [];
for ($i=0; $i < pow(2, 21); $i++) {
    $number[] = random_int(pow(2, 0), pow(2, 15));
}

// $gen = generator();
// foreach ($gen as $key => $value) {
//     //
// }

$endMemory = memory_get_peak_usage(true);
$endTime = microtime(true);

$realMemory = $endMemory - $startMemory;
$realTime = $endTime - $startTime;

echo "Real memory usage: " . convertMemory($realMemory);
echo "\nExecuted time: " . $realTime;

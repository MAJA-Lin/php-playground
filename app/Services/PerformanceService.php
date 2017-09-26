<?php

namespace App\Services;

use App\Traits\MemoryCalculatorTrait;
use App\Traits\ExecutedTimeCalculatorTrait;

class PerformanceService
{
    use MemoryCalculatorTrait, ExecutedTimeCalculatorTrait;

    public function __construct()
    {
        $this->maximum = pow(2, 22);
        $this->initExecutedTimeCalculator();
        $this->initMemoryUsageCalculator();
    }

    public function normalLoop()
    {
        $this->startExecutedTimeCalculator();
        $this->startMemoryUsageCalculator();

        $number = [];
        for ($i=0; $i < $this->maximum; $i++) {
            $number[] = random_int(pow(2, 0), pow(2, 7));
        }

        echo "\n";
        echo "Real memory usage: " . $this->getMemoryUsage() . "\n";
        echo "Executed time: " . $this->getExecutedTime() . "\n";
    }

    public function yieldTest()
    {
        $this->startExecutedTimeCalculator();
        $this->startMemoryUsageCalculator();

        $maximum = $this->maximum;
        $generator = function () use ($maximum) {
            for ($i = 0; $i < $maximum; $i++) {
                $number = random_int(pow(2, 0), pow(2, 15));
                yield $number;
            }
        };

        echo "\n";
        echo "Real memory usage: " . $this->getMemoryUsage() . "\n";
        echo "Executed time: " . $this->getExecutedTime() . "\n";
    }
}

<?php

namespace App\Traits;

trait MemoryCalculatorTrait
{
    public function convertMemory($size)
    {
        if ($size == 0) {
            return '0 b';
        }

        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
        return @round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

    public function initMemoryUsageCalculator()
    {
        $this->startMemory = null;
        $this->endMemory = null;
    }

    public function startMemoryUsageCalculator()
    {
        $this->startMemory = memory_get_peak_usage(true);
    }

    public function getMemoryUsage(bool $displayRawMemory = false)
    {
        if (!isset($this->startMemory)) {
            return false;
        }

        $this->endMemory = memory_get_peak_usage(true);
        $rawMemoryUsage = $this->endMemory - $this->startMemory;

        if ($displayRawMemory === true) {
            return $rawMemoryUsage;
        }

        return $this->convertMemory($rawMemoryUsage);
    }
}

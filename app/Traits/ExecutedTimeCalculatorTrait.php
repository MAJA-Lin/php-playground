<?php

namespace App\Traits;

trait ExecutedTimeCalculatorTrait
{
    public function initExecutedTimeCalculator()
    {
        $this->startTime = null;
        $this->endTime = null;
    }

    public function startExecutedTimeCalculator()
    {
        $this->startTime = microtime(true);
    }

    public function getExecutedTime()
    {
        if (!isset($this->startTime)) {
            return false;
        }

        $this->endTime = microtime(true);
        $realTime = $this->endTime - $this->startTime;
        return $realTime;
    }
}

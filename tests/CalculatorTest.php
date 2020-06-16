<?php

namespace App\Tests;

use App\Domain\CalculationRules;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculator()
    {
        $rules = new CalculationRules();
        $alice = new \App\Domain\Person('Alice', 26, 6000, 2, false);
        $calculator = new Calculator($rules);
        $result = $calculator->apply($alice);
    }

}

<?php

namespace App\Tests;

use App\Domain\CalculationResult;
use App\Domain\CalculationRules;
use App\Domain\Person;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testCalculator(Person $person, CalculationResult $result)
    {
        $rules = new CalculationRules();
        $alice = new Person('Alice', 26, 6000, 2, false);
        $calculator = new Calculator($rules);
        $result = $calculator->apply($alice);
    }

    public function getTestData()
    {
        yield [new Person('Alice', 26, 2, false, 6000), new CalculationResult(4800, 1200)];
        yield [new Person('Bob', 52, null, true, 4000), new CalculationResult(3024, 756)];
        yield [new Person('Charlie', 36, 3, true, 5000), new CalculationResult(3690, 810)];
    }

}

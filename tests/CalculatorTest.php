<?php

namespace App\Tests;

use App\CalculationResult;
use App\Domain\CalculationRules;
use App\Domain\Person;
use App\Domain\Rule\MoreThanTwoKids;
use App\Domain\Rule\OlderFifty;
use App\Domain\Rule\SalaryTerms;
use App\Domain\Rule\UsingCompanyCar;
use App\Service\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider getTestData
     */
    public function testCalculator(Person $person, CalculationResult $result)
    {
        $rules = new CalculationRules(new OlderFifty(), new MoreThanTwoKids(), new UsingCompanyCar());
        $calculator = new Calculator($rules);
        $this->assertEquals($calculator->apply($person), $result);
    }

    public function getTestData()
    {
        yield [new Person('Alice', 26, 2, false, new SalaryTerms(6000)), new CalculationResult(4800, 1200)];
        yield [new Person('Bob', 52, null, true, new SalaryTerms(4000)), new CalculationResult(3024, 756)];
        yield [new Person('Charlie', 36, 3, true, new SalaryTerms(5000)), new CalculationResult(3690, 810)];
    }

}

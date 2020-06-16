<?php


namespace App\Service;


use App\Domain\CalculationResult;
use App\Domain\CalculationRules;
use App\Domain\Person;

class Calculator
{
    private CalculationRules $rules;

    public function __construct(CalculationRules $rules)
    {
        $this->rules = $rules;
    }

    public function apply(Person $person): CalculationResult
    {
        return new CalculationResult(1, 2);
    }
}

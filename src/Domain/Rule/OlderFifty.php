<?php


namespace App\Domain\Rule;


use App\Domain\CalculationResult;
use App\Domain\CalculationRule;
use App\Domain\Person;

class OlderFifty implements CalculationRule
{


    public function supports(Person $person): bool
    {
        return $person->getAge() > 50;
    }

    public function modifySalary(Person $person): CalculationResult
    {
        // TODO: Implement modifySalary() method.
    }

    public function modifyTax(Person $person): CalculationResult
    {
        // TODO: Implement modifyTax() method.
    }
}

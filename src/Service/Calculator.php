<?php


namespace App\Service;


use App\CalculationResult;
use App\Domain\CalculationRules;
use App\Domain\Person;
use App\Domain\Rule\RuleInterface;

class Calculator
{
    private CalculationRules $rules;

    public function __construct(CalculationRules $rules)
    {
        $this->rules = $rules;
    }

    public function apply(Person $person): CalculationResult
    {
        $rules = $this->rules->filteredAndOrderedRules($person);
        $salaryTerms = $person->getSalaryTerms();
        foreach ($rules as $rule) {
            /** @var RuleInterface $rule */
            $salaryTerms = $rule->modify($salaryTerms);
        }
        $gross = $salaryTerms->getSalary();
        $tax = $gross * $salaryTerms->getTax() / 100;
        $net = $gross - $tax;
        return new CalculationResult($net, $tax);
    }
}

<?php


namespace App\Service;


use App\CalculationResult;
use App\Domain\Person;
use App\Domain\Rule\CalculationRules;
use App\Domain\Rule\RuleInterface;

class Calculator
{
    private CalculationRules $rules;

    public function __construct(CalculationRules $rules)
    {
        $this->rules = $rules;
    }

    public function calculate(Person $person): CalculationResult
    {
        $rules = $this->rules->filteredAndOrderedRules($person);
        $counter = 0;
        $history = [
            0 => [
                'rule'   => null,
                'result' => $salaryTerms = $person->getSalaryTerms(),
            ],
        ];
        foreach ($rules as $rule) {
            /** @var RuleInterface $rule */
            $history[++$counter] = [
                'rule'   => \get_class($rule),
                'result' => $salaryTerms = $rule->modify($salaryTerms),
            ];
        }
        $lastResult = $history[$counter]['result'];
        $gross = $lastResult->getSalary();
        $tax = $gross * $salaryTerms->getTax() / 100;
        $net = $gross - $tax;
        return new CalculationResult($net, $tax);
    }
}

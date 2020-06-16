<?php


namespace App\Domain;


class CalculationRules
{
    private array $rules;

    public function __construct(CalculationRule ...$rules)
    {
        $this->rules = $rules;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setRules(CalculationRule ...$rules): void
    {
        $this->rules = $rules;
    }

    public function addRule(CalculationRule $rule)
    {
        if ( ! in_array($rule, $this->rules)) {
            $this->rules[] = $rule;
        }
    }

    public function filteredRules(Person $person)
    {
        return array_filter(
            $this->rules,
            static function (CalculationRule $rule) use ($person) {
                return $rule->supports($person);
            }
        );
    }

}

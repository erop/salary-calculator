<?php


namespace App\Domain;


use App\Domain\Rule\RuleInterface;

class CalculationRules
{
    private array $rules;

    public function __construct(RuleInterface ...$rules)
    {
        $this->rules = $rules;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setRules(RuleInterface ...$rules): void
    {
        $this->rules = $rules;
    }

    public function addRule(RuleInterface $rule)
    {
        if ( ! in_array($rule, $this->rules)) {
            $this->rules[] = $rule;
        }
    }

    public function filteredAndOrderedRules(Person $person)
    {
        $filtered = array_filter(
            $this->rules,
            static function (RuleInterface $rule) use ($person) {
                return $rule->supports($person);
            }
        );
        usort(
            $filtered,
            static function (RuleInterface $prev, RuleInterface $next) {
                return $next->getPriority() <=> $prev->getPriority();
            }
        );
        return $filtered;
    }

}

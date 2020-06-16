<?php


namespace App\Domain\Rule;


use App\Domain\Person;

class CalculationRules
{
    private array $rules;

    public function __construct(RuleInterface ...$rules)
    {
        $this->rules = $rules;
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

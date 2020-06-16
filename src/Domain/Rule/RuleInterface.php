<?php


namespace App\Domain\Rule;


use App\Domain\Person;

interface RuleInterface
{
    public function getPriority(): int;

    public function supports(Person $person): bool;

    public function modify(SalaryTerms $salaryTerms): SalaryTerms;
}

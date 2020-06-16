<?php


namespace App\Domain\Rule;


use App\Domain\Person;

class MoreThanTwoKids implements RuleInterface
{

    public function getPriority(): int
    {
        return 256;
    }

    public function supports(Person $person): bool
    {
        return $person->getKids() > 2;
    }

    public function modify(SalaryTerms $salaryTerms): SalaryTerms
    {
        return new SalaryTerms($salaryTerms->getSalary(), $salaryTerms->getTax() - 2);
    }
}

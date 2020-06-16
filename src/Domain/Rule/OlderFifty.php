<?php


namespace App\Domain\Rule;


use App\Domain\Person;

class OlderFifty implements RuleInterface
{

    public function supports(Person $person): bool
    {
        return $person->getAge() > 50;
    }

    public function modify(SalaryTerms $salaryTerms): SalaryTerms
    {
        return new SalaryTerms($salaryTerms->getSalary() * 1.07, $salaryTerms->getTax());
    }

    public function getPriority(): int
    {
        return 1024;
    }

}

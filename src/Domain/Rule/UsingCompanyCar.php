<?php


namespace App\Domain\Rule;


use App\Domain\Person;

class UsingCompanyCar implements RuleInterface
{

    public function getPriority(): int
    {
        return 8;
    }

    public function supports(Person $person): bool
    {
        return $person->isUsingCar();
    }

    public function modify(SalaryTerms $salaryTerms): SalaryTerms
    {
        return new SalaryTerms($salaryTerms->getSalary() - 500, $salaryTerms->getTax());
    }
}

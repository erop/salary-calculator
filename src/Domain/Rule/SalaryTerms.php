<?php


namespace App\Domain\Rule;


class SalaryTerms
{
    private int $salary;

    private int $tax = 20;

    public function __construct(int $salary, int $tax = null)
    {
        $this->salary = $salary;
        if (null !== $tax) {
            $this->tax = $tax;
        }
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getTax(): int
    {
        return $this->tax;
    }

}

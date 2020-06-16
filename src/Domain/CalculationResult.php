<?php


namespace App\Domain;


class CalculationResult
{
    private int $salary;
    private int $tax;

    public function __construct(int $salary, int $tax)
    {
        $this->salary = $salary;
        $this->tax = $tax;
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

<?php


namespace App\Domain;


use App\Domain\Rule\SalaryTerms;

class Person
{

    private string $name;

    private int $age;

    private SalaryTerms $salaryTerms;

    private ?int $kids;

    private ?bool $usingCar;

    public function __construct(string $name, int $age, ?int $kids, ?bool $usingCar, SalaryTerms $salaryTerms)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kids = $kids;
        $this->usingCar = $usingCar;
        $this->salaryTerms = $salaryTerms;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getSalaryTerms(): SalaryTerms
    {
        return $this->salaryTerms;
    }

    public function getKids(): ?int
    {
        return $this->kids;
    }

    public function isUsingCar(): ?bool
    {
        return $this->usingCar;
    }


}

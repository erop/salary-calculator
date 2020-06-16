<?php


namespace App\Domain;


class Person
{

    private string $name;

    private int $age;

    private int $salary;

    private ?int $kids;

    private ?bool $isUsingCorpCar;

    public function __construct(string $name, int $age, ?int $kids, ?bool $isUsingCorpCar, int $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kids = $kids;
        $this->isUsingCorpCar = $isUsingCorpCar;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getKids(): ?int
    {
        return $this->kids;
    }

    public function getIsUsingCorpCar(): ?bool
    {
        return $this->isUsingCorpCar;
    }


}

<?php


namespace App\Domain;


class Person
{

    private string $name;

    private int $age;

    private int $salary;

    private ?int $children;

    private ?bool $isUsingCorpCar;

    public function __construct(string $name, int $age, int $salary, ?int $children, ?bool $isUsingCorpCar)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->children = $children;
        $this->isUsingCorpCar = $isUsingCorpCar;
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

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function getIsUsingCorpCar(): ?bool
    {
        return $this->isUsingCorpCar;
    }


}

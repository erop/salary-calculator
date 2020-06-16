<?php


namespace App\Domain;


interface CalculationRule
{
    public function supports(Person $person): bool;

    public function modifySalary(Person $person): CalculationResult;

    public function modifyTax(Person $person): CalculationResult;
}

<?php

use App\Domain\Person;
use App\Domain\Rule\CalculationRules;
use App\Domain\Rule\MoreThanTwoKids;
use App\Domain\Rule\OlderFifty;
use App\Domain\Rule\SalaryTerms;
use App\Domain\Rule\UsingCompanyCar;
use App\Service\Calculator;

require __DIR__ . '/../vendor/autoload.php';


$bill = new Person('Bill', 31, 2, false, new SalaryTerms(6000));
$rules = new CalculationRules(
    new OlderFifty(),
    new MoreThanTwoKids(),
    new UsingCompanyCar()
);
$calculator = new Calculator($rules);
$result = $calculator->calculate($bill);
echo sprintf('Net salary: %d', $result->getNet()) . PHP_EOL;
echo sprintf('Tax paid: %d', $result->getTax()) . PHP_EOL;

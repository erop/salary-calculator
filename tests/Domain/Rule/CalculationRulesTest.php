<?php

namespace App\Tests\Domain\Rule;

use App\Domain\Person;
use App\Domain\Rule\CalculationRules;
use App\Domain\Rule\RuleInterface;
use PHPUnit\Framework\TestCase;

class CalculationRulesTest extends TestCase
{
    public function testFilteringAndSortingRules()
    {
        $relevantRule1 = $this->createStub(RuleInterface::class);
        $relevantRule1->method('supports')->willReturn(true);
        $relevantRule1->method('getPriority')->willReturn(1024);

        $relevantRule2 = $this->createStub(RuleInterface::class);
        $relevantRule2->method('supports')->willReturn(true);
        $relevantRule2->method('getPriority')->willReturn(8);

        $nonRelevantRule = $this->createStub(RuleInterface::class);
        $nonRelevantRule->method('supports')->willReturn(false);
        $nonRelevantRule->method('getPriority')->willReturn(256);

        $person = $this->createStub(Person::class);
        $rules = new CalculationRules($relevantRule1, $relevantRule2, $nonRelevantRule);
        $relevantRules = $rules->filteredAndOrderedRules($person);

        $this->assertCount(2, $relevantRules);
        $this->assertSame($relevantRule1, $relevantRules[0]);
        $this->assertSame($relevantRule2, $relevantRules[1]);
    }

}

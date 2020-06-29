<?php

namespace App\Tests\Domain\Rule;

use App\Domain\Person;
use App\Domain\Rule\CalculationRules;
use App\Domain\Rule\RuleInterface;
use PHPUnit\Framework\TestCase;

class CalculationRulesTest extends TestCase
{
    public function testFilteringRules()
    {
        $relevantRule = $this->createStub(RuleInterface::class);
        $relevantRule->method('supports')->willReturn(true);
        $nonRelevantRule = $this->createStub(RuleInterface::class);
        $nonRelevantRule->method('supports')->willReturn(false);
        $rules = new CalculationRules($relevantRule, $nonRelevantRule);
        $relevantRules = $rules->filteredAndOrderedRules($this->createStub(Person::class));
        $this->assertCount(1, $relevantRules);
        $this->assertSame($relevantRule, $relevantRules[0]);
    }

}

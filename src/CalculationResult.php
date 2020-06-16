<?php


namespace App;


class CalculationResult
{
    private int $net;

    private int $tax;

    public function __construct(int $net, int $tax)
    {
        $this->net = $net;
        $this->tax = $tax;
    }

    public function getNet(): int
    {
        return $this->net;
    }

    public function getTax(): int
    {
        return $this->tax;
    }

}

<?php

class NumberGenerator
{

    public function getNumber(int $min, int $max): int
    {
        return rand($min, $max);
    }

}
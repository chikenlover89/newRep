<?php

class FormatNumber{

    public static function toEUR(int $number):string
    {
        return number_format($number/100,2)." EUR";
    }

    public static function toBrackets(int $number):string
    {
        return "($number)";
    }

}
<?php


class Product
{

    private string $name;
    private int $price;
    private int $stock;

    public function __construct(string $name, int $price, int $stock)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function buyItem(): string
    {
        if ($this->stock <= 0) {
            return "NOK";
        } else {
            $this->stock--;
            return "OK";
        }

    }

}
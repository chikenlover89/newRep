<?php

class Shop
{

    public array $items = [];

    public function add(Product $new): void
    {
        $this->items[] = $new;
    }

    public function all(): array
    {
        return $this->items;
    }

    function seeItems(): string
    {
        $ans = '';
        foreach ($this->items as $item) {

            $ans .= $item->getName() . " " . FormatNumber::toEUR($item->getPrice()) . " " . FormatNumber::toBrackets($item->getStock()) . "\n";
        }
        return $ans;
    }

    function fillStore(StockFileManager $storage): void
    {
        foreach ($storage->readCSVstock() as $item) {
            $this->add(new Product(trim($item[0]), (int)$item[1], (int)$item[2]));
        }
    }

    function auditStore(StockFileManager $storage): void
    {
        $storage->writeCSVstock($this->all());
        //var_dump($this->items);
    }
}
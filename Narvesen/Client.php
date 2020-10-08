<?php

class Client
{

    private string $name;
    private array $stock = [];
    private int $money;

    public function __construct(string $name, int $money, array $stock)
    {
        $this->name = $name;
        $this->money = $money;
        $this->stock = $stock;
    }

    public function getMoney(): string
    {
        return $this->money;
    }

    public function setStock(string $item): void
    {
        $this->stock[] = $item;
    }

    public function getStock(): array
    {
        return $this->stock;
    }

    public function chargeMoney(int $price): void
    {
        $this->money -= $price;
    }

    public function myStock(): string
    {

        $ans = 'You have ';
        $n = 0;
        if (count($this->stock) > 0) {
            $occurences = array_count_values($this->stock);
            $keys = array_keys($occurences);
            foreach ($occurences as $item) {

                if($n != (count($occurences)-1)) {
                    $ans .= $keys[$n].' '.FormatNumber::toBrackets($item) . ", ";
                }else{
                    $ans .= $keys[$n].' '.FormatNumber::toBrackets($item) . ".";
                }
                $n++;
            }
        } else {
            $ans .= 'nothing.';
        }
        return $ans;



    }

    function buyItem(Shop $shop,AccountFileManager $account, StockFileManager $stock, string $grocery): string
    {
        $ans = "OUT OF STOCK!\n";
        foreach ($shop->all() as $item) {

            if ($item->getName() == $grocery) {
                if ($item->getPrice() > $this->getMoney()) {
                    $ans = "NOT ENOUGH MONEY!\n";
                } else {
                    if ($item->buyItem() == 'OK' && $item->getPrice() <= $this->getMoney()) {
                        $this->setStock($grocery);
                        $stock->writeStock($this->getStock());
                        $this->chargeMoney($item->getPrice());
                        $account->writeAccount($this->getMoney());
                        $ans = "ITEM BOUGHT!\n";
                    }
                }

            }
        }

        return $ans;
    }




}
<?php


class StockFileManager
{
    private string $data = '';
    private string $path = '';

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function readStock(): array
    {
        $this->data = file_get_contents($this->path);
        $stock = explode(" ", $this->data);
        $stock = array_filter($stock);

        return $stock;
    }

    public function writeStock(array $stock): void
    {
        file_put_contents($this->path, join(" ", $stock));
    }

    public function readCSVstock():array
    {
        $this->data = file_get_contents($this->path);
        $stock = explode("|", $this->data);
        $stock = array_filter($stock);

        foreach($stock as &$item){
            $item = explode(";", $item);
        }

        for($i = 0;$i<count($stock);$i++){
            if(count($stock[$i]) < 2){
                unset($stock[$i]);
            }
        }

        return $stock;
    }

    public function writeCSVstock(array $currentStock):void
    {
        $toWrite = '';

        foreach($currentStock as $item){
            $toWrite .= $item->getName().";".$item->getPrice().";".$item->getStock()."|\n";
        }

        file_put_contents($this->path, $toWrite);


    }

}
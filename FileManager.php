<?php

class FileManager
{

    private string $data = '';
    private string $path = '';

    public function __construct(string $path){
        $this->path = $path;
    }

    public function addNumToFile(int $num): void
    {
        $this->data = file_get_contents($this->path) . "$num ";
        file_put_contents($this->path,$this->data);
    }

    public function getAverage(): int
    {
        $numArr = explode(" ", $this->data);
        return (array_sum($numArr) / (count($numArr) - 1));
    }

}

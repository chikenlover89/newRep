<?php

class FileManager
{

    private string $data = '';

    public function addNumToFile(int $num): void
    {
        $this->data = file_get_contents('./file.txt') . "$num ";
        file_put_contents('./file.txt', $this->data);
    }

    public function getAverage(): int
    {
        $numArr = explode(" ", $this->data);
        return (array_sum($numArr) / (count($numArr) - 1));
    }

}

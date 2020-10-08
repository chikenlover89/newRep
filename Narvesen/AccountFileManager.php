<?php


class AccountFileManager
{
    private string $path = '';

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function readAccount(): int
    {
        $balance = file_get_contents($this->path);
        $balance = trim($balance);

        if (is_numeric($balance)) {
            return (int)$balance;
        } else {
            return 0;
        }
    }

    public function writeAccount(int $money): void
    {
        file_put_contents($this->path, $money);
    }



}
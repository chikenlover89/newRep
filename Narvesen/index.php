<?php

require_once 'Product.php';
require_once 'Shop.php';
require_once 'Client.php';
require_once 'FormatNumber.php';
require_once 'StockFileManager.php';
require_once 'AccountFileManager.php';


$JohnsAccount = new AccountFileManager('./clientAccount.txt');
$JohnsStock = new StockFileManager('./clientStock.txt');
$John = new Client("John", $JohnsAccount->readAccount(), $JohnsStock->readStock());

$Narvesen = new Shop();
$NarvesenStock = new StockFileManager('./shopStock.txt');

$Narvesen->fillStore($NarvesenStock);

$check = '';


while ($check != "Not enough money!") {

    echo $Narvesen->seeItems() . "\n";

    echo "Your money: " . FormatNumber::toEUR($John->getMoney()) . "\n" . $John->myStock() . "\n\n";
    $check = $John->buyItem($Narvesen,$JohnsAccount, $JohnsStock, readline("What to buy: "));
    $Narvesen->auditStore($NarvesenStock);
    echo $check . "\n";

}






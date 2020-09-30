<?php

require_once 'NumberGenerator.php';
require_once 'FileManager.php';

$numberGenerator = new NumberGenerator();
$num = $numberGenerator->getNumber(1,1000);
$fileManager = new FileManager();

$fileManager->addNumToFile($num);
echo "Number: $num\nAVG: ".$fileManager->getAverage()."\n";

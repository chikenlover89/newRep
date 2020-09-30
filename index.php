<?php

require_once 'NumberGenerator.php';
require_once 'FileManager.php';

$numberGenerator = new NumberGenerator();
$num = $numberGenerator->getNumber(1, 1000);

$fileManager = new FileManager('./file.txt');
$fileManager->addNumToFile($num);
$AVG = $fileManager->getAverage();

echo "Number: $num\nAVG: " . $AVG . "\n";
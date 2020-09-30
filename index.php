<?php

require_once 'NumberGenerator.php';
require_once 'FileManager.php';

$numberGenerator = new NumberGenerator();
$fileManager = new FileManager();

$fileManager->addNumToFile($numberGenerator->getNumber(1,1000));
echo $fileManager->getAverage()."\n";
<?php
require './vendor/autoload.php';
$xsdFile = './example/openimmo_127b.xsd';

$apiGenerator = new \REO\OpenImmo\Generator\ApiGenerator();
$apiGenerator->generateApiClasses($xsdFile);
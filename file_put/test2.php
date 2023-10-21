<?php
$contactFile = '.contact.dat';

$contents = fopen($contactFile, 'a+');

$addText = '1行追記テスト！' . "\n";

fwrite($contents, $addText);

fclose($contents);

echo file_get_contents($contactFile);

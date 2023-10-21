<?php
//ファイルを丸ごと読み込み
$contactFile = '.contact.dat';

// $fileContents = file_get_contents($contactFile);

// echo $fileContents;

//ファイルに書き込み(上書き)
// file_put_contents($contactFile, 'えええ');

//ファイルに書き込み(追記)
// $text = 'えええ' ."\n";
// file_put_contents($contactFile, $text, FILE_APPEND);

//配列 file, 区切る explode, foreach

$allData = file($contactFile);
// echo '<pre>';var_dump($allData);echo '</pre>';exit;
foreach($allData as $lineData){
  $lines = explode(',', $lineData);
  echo $lines[0] . '<br>';
  echo $lines[1] . '<br>';
  echo $lines[2] . '<br>';
}

<?php

//変数
// 先頭は英文字または_
$test = 123;
$test = '変数で表示しています。';
echo $test;
echo '<br>';
// var_dump()で型を確認できる。
$test = 'var_dump()で表示しています。';
var_dump($test);
echo '<br>';

$test1 = 123;
$test2 = 456;
// .で繋げて表示
$test3 = $test1 . $test2;
echo"変数で数字をつなげると文字として認識される";
echo "<br>";
var_dump($test3);
echo '<br>';
// 計算もできる
$test4 = $test1 + $test2;
echo $test4;
echo '<br>';

// 定数
const MAX = 'テスト';
const MAX = '変数のように上書きできない';

echo MAX;
